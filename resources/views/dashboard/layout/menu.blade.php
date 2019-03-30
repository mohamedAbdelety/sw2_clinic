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
	                    <a href="pages/widgets/cards/basic.html">Add FR</a>
	                </li>
	                <li>
	                    <a href="pages/widgets/cards/colored.html">Manage FR</a>
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
</ul>
@endif


@if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 3)
<ul class="list">
	<li class="header">MAIN NAVIGATION For FR</li>                 
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










          