<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Detection;
use App\DataTables\patientDatatable;
use App\DataTables\notpullDatatable;
use App\DataTables\todayDatatable;
use Auth;
use Carbon\Carbon;
class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(patientDatatable $datatable)
    {
        return $datatable->render('dashboard.secratry.patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.secratry.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),[
            'name' => 'required|unique:patients|max:50|min:8',
            'mobile' => 'sometimes|nullable',
            'address'=>'sometimes|nullable|min:5|max:50',
            'job'=>'required',
            'gender' => 'required',
            'age'=>'required|integer|min:1',
        ]);
        $id = Patient::create($data)->id;
        $doctor_id = get_doctorid_forsecratry(Auth::user()->id);
        $doctor_price = get_doctorprice_forsecratry(Auth::user()->id);
        $doctor_name = get_doctorname_forsecratry(Auth::user()->id);
        Detection::create(['price'=>$doctor_price,'doctor_id'=>$doctor_id,'patient_id'=>$id,'prescription'=>'']);
        session()->flash('add_success',trans('admin.patient_add_success_msg',['doctorname'=>$doctor_name,'price'=>$doctor_price]));
        return redirect('/dashboard/secratry/controll/patient/create');        
    }


    public function add_dection(){
        return view('dashboard.secratry.patient.createdetection');
    }
    public function add_dection_post(){
        $data = $this->validate(request(),[
            'patient_id' => 'required',
        ]);
        $id = request('patient_id');
        $doctor_id = get_doctorid_forsecratry(Auth::user()->id);
        $doctor_name = get_doctorname_forsecratry(Auth::user()->id);
        if(request('type') == '0'){   
            $doctor_price = get_doctorprice_forsecratry(Auth::user()->id);      
            Detection::create(['price'=>$doctor_price,'doctor_id'=>$doctor_id,'patient_id'=>$id,'prescription'=>'']);
            session()->flash('add_success',trans('admin.detection_add_success_msg',['doctorname'=>$doctor_name,'price'=>$doctor_price]));
            return redirect('/dashboard/secratry/controll/patient/create');
        }else{
           $end_date = date('Y-m-d',time());
           $end_date = $end_date." 23:59:59";
           $last_detection = Detection::where('patient_id',$id)->where('doctor_id',$doctor_id)->whereBetween('created_at',[date('Y-m-d 00:00:00', strtotime('-14 days')),$end_date])->orderBy('id','desc')->first();
           if($last_detection != null && $last_detection->detection_id == null && $last_detection->finish == '1' && $last_detection->observation == '0'){
                Detection::create(['price'=>0.0,'doctor_id'=>$doctor_id,'patient_id'=>$id,'prescription'=>'','detection_id'=>$last_detection->id,'pull'=>'1']);
                Detection::where('id',$last_detection->id)->update(['observation'=>'1']);
                session()->flash('add_success',trans('admin.yes_observ_msg',['doctorname'=>$doctor_name]));
                return redirect('/dashboard/secratry/controll/detection/create');
           }else{
                session()->flash('no_observe_success',trans('admin.no_observ_msg',['doctorname'=>$doctor_name]));
                return redirect('/dashboard/secratry/controll/detection/create');
           } 
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
         $patient =  Patient::find($id);
        return view('dashboard.secratry.patient.edit',compact('patient'));  
    }

    public function update($id){
        $data = $this->validate(request(),[
            'name' => 'required|max:50|min:8|unique:patients,name,'.$id,
            'mobile' => 'sometimes|nullable',
            'address'=>'sometimes|nullable|min:5|max:50',
            'job'=>'required',
            'gender' => 'required',
            'age'=>'required|integer|min:1',
        ]);
        Patient::where('id',$id)->update($data);
        session()->flash('add_success',trans('admin.patient_update_success_msg'));
        return redirect('/dashboard/secratry/controll/patient'); 
    }
            
     public function notpull_dection(notpullDatatable $datatable){
        return $datatable->render('dashboard.secratry.patient.notpull');
     }

      public function today_dection(todayDatatable $datatable){
        return $datatable->render('dashboard.secratry.patient.today');
     }

     public function notpull_dection_destory($id){
         $detection = Detection::find($id)->delete();
        session()->flash('delete_success',trans('admin.notpull_delete_success_msg'));
        return redirect('/dashboard/secratry/controll/detection/notpull');
        
     }
     public function notpull_delete_all(){
         Detection::where('pull','0')->where('doctor_id',get_doctorid_forsecratry(Auth::user()->id))->delete();
        session()->flash('delete_success',trans('admin.notpull_delete_success_msg'));
        return redirect('/dashboard/secratry/controll/detection/notpull');
     }

     public function sendto_doctor($id){
        Detection::where('id',$id)->update(['send'=>'1']);
        session()->flash('add_success',trans('admin.patient_sendtodoctor_success_msg'));
        return redirect('/dashboard/secratry/controll/detection/today');
     }

     public function fr_detection_price_list(){
        $detections = Detection::join('patients', 'patients.id',   '=', 'detections.patient_id')->where('detections.pull','0')->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])
        ->select('detections.id','detections.doctor_id',
            'detections.price','detections.created_at','patients.mobile','patients.name'
        )
        ->get();
        return view('dashboard.fr.patient.index',compact('detections'));
     }



     public function fr_detection_price_search(Request $req){
       if($req->ajax()){
            if(request('keyword')!=''){
                $detections = Detection::join('patients', 'patients.id',   '=', 'detections.patient_id')->where('detections.pull','0')->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('patients.name','like','%'.request('keyword').'%')
                ->select('detections.id','detections.doctor_id',
                    'detections.price','detections.created_at','patients.mobile','patients.name'
                )
                ->get();
            }else{
                 $detections = Detection::join('patients', 'patients.id',   '=', 'detections.patient_id')->where('detections.pull','0')->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])
                ->select('detections.id','detections.doctor_id',
                    'detections.price','detections.created_at','patients.mobile','patients.name'
                )
                ->get();
            }
            $html = view('dashboard.fr.patient.detections_ajax',compact('detections'));
            return response($html);
       }
        
     }




      public function fr_detection_price_pull(Request $req){
       if($req->ajax()){
                Detection::find(request('id'))->update(['pull'=>'1']);
                $detections = Detection::join('patients', 'patients.id',   '=', 'detections.patient_id')->where('detections.pull','0')->whereBetween('detections.created_at',[date('Y-m-d 00:00:00',time()),date('Y-m-d 23:59:59',time())])->where('patients.name','like','%'.request('keyword').'%')
                ->select('detections.id','detections.doctor_id',
                    'detections.price','detections.created_at','patients.mobile','patients.name'
                )
                ->get();
            $html = view('dashboard.fr.patient.detections_ajax',compact('detections'));
            return response($html);
       }
        
     }


















   
}
