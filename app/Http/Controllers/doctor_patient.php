<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Detection;
use App\DataTables\detection_doctor_todayDatatable;
use App\DataTables\patientDatatable;
use Auth;
use Carbon\Carbon;
class doctor_patient extends Controller
{
    public function show(patientDatatable $datatable){
    	return $datatable->render('dashboard.doctor.patient.index');
    }
    public function detection_today(detection_doctor_todayDatatable $datatable){
    	return $datatable->render('dashboard.doctor.patient.detection_today');
    }
    public function detection_now_get(){
    	$patient_detect = Detection::join('patients', 'patients.id','=', 'detections.patient_id')->where('detections.send','1')->where('detections.doctor_id',get_doctorid(Auth::user()->id))->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('detections.finish','0')
        ->select('detections.id','detections.price','patients.job','patients.address','detections.send','detections.finish','detections.created_at','patients.mobile','patients.name','patients.age','detections.detection_id','patients.id as patientID')->first();
        

        $history = Detection::join('patients', 'patients.id','=', 'detections.patient_id')->where('detections.prescription','!=','')->where('patients.id',$patient_detect->patientID)->orderBy('detections.id','desc')->select('detections.created_at','detections.doctor_id','detections.prescription')->get();
    	
    	return view('dashboard.doctor.patient.detection_now',compact('patient_detect','history'));
    }

    public function detection_now_post(){
    	$data = $this->validate(request(),[
            'prescription' => 'required|min:10',
        ]);
    	$patient_detect = Detection::join('patients', 'patients.id','=', 'detections.patient_id')->where('detections.send','1')->where('detections.doctor_id',get_doctorid(Auth::user()->id))->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('detections.finish','0')
        ->select('detections.id')->first();
        Detection::find($patient_detect->id)->update(['prescription'=>request('prescription'),'finish'=>'1']);
    	return redirect('/dashboard/doctor/controll/patient/detection/today');
    }


}
