@if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1)
<ul class="list">
	<li class="header">MAIN NAVIGATION</li>
	<li class="active">
	    <a href="{{url('/dashboard/admin/index')}}">
	        <i class="material-icons">dashboard</i>
	        <span>Dashboard</span>
	    </a>
	</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>Manage Admins</span>
	    </a>
	    <ul class="ml-menu">
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>HR</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/hr/create')}}">Add HR</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/hr')}}">Manage HR</a>
	                </li>
	            </ul>
	        </li>
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>FR</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/fr/create')}}">Add FR</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/fr')}}">Manage FR</a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>Manage Doctor</span>
	    </a>
	    <ul class="ml-menu">
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>Doctor</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/doctor/create')}}">Add Doctor</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/doctor')}}">Manage Doctor</a>
	                </li>
	            </ul>
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
	                    <a href="{{url('/dashboard/admin/controll/secretary/create')}}">Add Secretary</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/secretary')}}">Manage Secretary</a>
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
	                    <a href="{{url('/dashboard/admin/controll/employee/create')}}">Add Employee</a>
	                </li>
	                <li>
	                    <a href="{{url('/dashboard/admin/controll/employee')}}">Manage Employee</a>
	                </li>
	            </ul>
	        </li>
	    </ul>
	</li>                   
</ul>
@endif


@if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2)
<ul class="list">
	<li class="header">MAIN NAVIGATION For HR</li>
	<li class="active">
	    <a href="{{url('/dashboard/hr/index')}}">
	        <i class="material-icons">dashboard</i>
	        <span>Dashboard</span>
	    </a>
	</li>
	<li>
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">group</i>
	        <span>Manage Doctor</span>
	    </a>
	    <ul class="ml-menu">
	        <li>
	            <a href="javascript:void(0);" class="menu-toggle">
	                <span>Doctor</span>
	            </a>
	            <ul class="ml-menu">
	                <li>
	                    <a href="{{url('/dashboard/hr/controll/doctor')}}">Manage Doctor</a>
	                </li>
	            </ul>
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
	        <span>Dashboard</span>
	    </a>
	</li>               
</ul>
@endif






@if(Auth::user()->role == 2)
<ul class="list">
	<li class="header">MAIN NAVIGATION For Doctor</li>                 
</ul>
@endif




@if(Auth::user()->role == 3)
<ul class="list">
	<li class="header">MAIN NAVIGATION For secratry</li>                 
</ul>
@endif










          