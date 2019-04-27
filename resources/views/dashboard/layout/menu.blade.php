@if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1)
<ul class="list">
	<li class="header">MAIN NAVIGATION</li>
	<li class="active">
	    <a href="{{url('/dashboard/admin/index')}}">
	        <i class="material-icons">dashboard</i>
	        <span>{{trans('common.dashboard')}}</span>
	    </a>
	</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>{{trans('common.manage_admins')}}</span>
	    </a>
	    <ul class="ml-menu">
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>{{trans('common.hr')}}</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/hr/create')}}">{{trans('common.add_hr')}}</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/hr')}}">{{trans('common.manage_hr')}}</a>
	                </li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>{{trans('common.fr')}}</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/fr/create')}}">{{trans('common.add_fr')}}</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/fr')}}">{{trans('common.manage_fr')}}</a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	</li>
	<li>
	   
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">group</i>
            <span>{{trans('common.manage_doctor')}}</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/admin/controll/doctor/create')}}">{{trans('common.add_doctor')}}</a>
            </li>
            <li>
                <a href="{{url('/dashboard/admin/controll/doctor')}}">{{trans('common.manage_doctor')}}</a>
            </li>
        </ul>
	        
	</li> 
	<li>
        <a href="javascript:void(0);" class="menu-toggle">
        	<i class="material-icons">group</i>
            <span>{{trans('common.secratry')}}</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/admin/controll/secretary/create')}}">{{trans('common.add_secratry')}}</a>
            </li>
            <li>
                <a href="{{url('/dashboard/admin/controll/secretary')}}">{{trans('common.manage_secratry')}}</a>
            </li>
        </ul>    
	</li>
	<li>
	    
        <a href="javascript:void(0);" class="menu-toggle">
        	<i class="material-icons">group</i>
            <span>{{trans('common.employee')}}</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/admin/controll/employee/create')}}">{{trans('common.add_employee')}}</a>
            </li>
            <li>
                <a href="{{url('/dashboard/admin/controll/employee')}}">{{trans('common.manage_employee')}}</a>
            </li>
        </ul>
	       
	</li>

	<li>
	    <a href="{{url('/dashboard/admin/website/setting')}}">
	        <i class="material-icons">settings</i>
	        <span>{{trans('common.website_setting')}}</span>
	    </a>
	</li>





</ul>
@endif


@if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2)
<ul class="list">
	<li class="header">MAIN NAVIGATION For HR</li>
	<li class="active">
	    <a href="{{url('/dashboard/hr/index')}}">
	        <i class="material-icons">dashboard</i>
	       <span>{{trans('common.dashboard')}}</span>
	    </a>
	</li>
	<li>
	   
        <a href="javascript:void(0);" class="menu-toggle">
        	<i class="material-icons">group</i>
            <span>{{trans('common.doctor')}}</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/hr/controll/doctor')}}">{{trans('common.manage_doctor')}}</a>
            </li>
        </ul>
	        
	</li> 
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>Manage Secretary</span>
	    </a>
	    <ul class="ml-menu">
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>Secretary</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/hr/controll/secretary/create')}}">Add Secretary</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/hr/controll/secretary')}}">Manage Secretary</a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>Manage Employee</span>
	    </a>
	    <ul class="ml-menu">
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>Employee</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/hr/controll/employee/create')}}">Add Employee</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/hr/controll/employee')}}">Manage Employee</a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	</li>

</ul>
@endif


@if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 3)
<ul class="list">
	<li class="header">MAIN NAVIGATION For FR</li>  
	<li class="active">
	    <a href="{{url('/dashboard/fr/index')}}">
	        <i class="material-icons">dashboard</i>
	        <span>{{trans('common.dashboard')}}</span>
	    </a>
	</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">assignment_ind</i>
	        <span>{{trans('common.patients')}}</span>
	    </a>
	   
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/fr/detection/price')}}">{{trans('common.price_dect')}}</a>
            </li>
        </ul>
	  
	</li> 
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">shop</i>
	        <span>{{trans('common.exchange')}}</span>
	    </a>
	   
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/fr/controll/exchange')}}">{{trans('common.manage_exchange')}}</a>
            </li>
            <li>
                <a href="{{url('/dashboard/fr/controll/exchange/create')}}">{{trans('common.add_exchange')}}</a>
            </li>
        </ul>
	  
	</li>



	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">money</i>
	        <span>{{trans('common.salary')}}</span>
	    </a>
	   
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/fr/salary/employee')}}">{{trans('common.employee_salary')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/fr/salary/doctor')}}">{{trans('common.doctor_salary')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/fr/salary/secretary')}}">{{trans('common.secratry_salary')}}</a>
            </li>
        </ul>
	  
	</li>









</ul>
@endif






@if(Auth::user()->role == 2)
<ul class="list">
	<li class="header">MAIN NAVIGATION For Doctor</li>
	<li class="active">
	    <a href="{{url('/dashboard/doctor/index')}}">
	        <i class="material-icons">dashboard</i>
	        <span>{{trans('common.dashboard')}}</span>
	    </a>
	</li> 
   	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>{{trans('common.patients')}}</span>
	    </a>
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/doctor/controll/patient/show')}}">{{trans('common.show_patients')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/doctor/controll/patient/detectnow')}}">{{trans('common.now_detection')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/doctor/controll/patient/detection/today')}}">{{trans('common.today_detection')}}</a>
            </li>
        </ul>
	</li>	             
</ul>
@endif




@if(Auth::user()->role == 3)
<ul class="list">
	<li class="header">MAIN NAVIGATION For secratry</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>{{trans('common.patients')}}</span>
	    </a>
	   
        <ul class="ml-menu">
            <li>
                <a href="{{url('/dashboard/secratry/controll/patient/create')}}">{{trans('common.add_patient')}}</a>
            </li>
            <li>
                <a href="{{url('/dashboard/secratry/controll/patient')}}">{{trans('common.manage_patients')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/secratry/controll/detection/create')}}">{{trans('common.add_detection')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/secratry/controll/detection/notpull')}}">{{trans('common.notpall_detection')}}</a>
            </li>
             <li>
                <a href="{{url('/dashboard/secratry/controll/detection/today')}}">{{trans('common.today_detection')}}</a>
            </li>
        </ul>
	  
	</li>                 
</ul>
@endif










          