<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">{{get_settings()->sitename}} - {{trans('common.dashboard')}}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   
                   
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">language</i>
                        </a>
                        <ul class="dropdown-menu" style="height: 250px">
                            <li class="header">Languages</li>
                            <li class="body">
                                <ul class="menu tasks list">
                                    <li>
                                        <a href="{{url('/lang/en')}}">
                                            <h5>
                                               English 
                                                @if(Auth::user()->lang == 'en')
                                                    <i class="material-icons pull-right">done</i>
                                                @endif
                                            </h5>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/lang/fr')}}">
                                            <h5>
                                               Frensh
                                               @if(Auth::user()->lang == 'fr')
                                                    <i class="material-icons pull-right">done</i>
                                                @endif
                                            </h5>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/lang/ar')}}">
                                            <h5>
                                               Arabic
                                               @if(Auth::user()->lang == 'ar')
                                                    <i class="material-icons pull-right">done</i>
                                                @endif
                                            </h5>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/lang/es')}}">
                                            <h5>
                                               Spanish
                                               @if(Auth::user()->lang == 'es')
                                                    <i class="material-icons pull-right">done</i>
                                                @endif
                                            </h5>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1)
                        <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                    @endif
                </ul>
            </div>
        </div>
</nav>


<!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    @if(Auth::user()->image != null)
                        <img src="{{ Storage::url(Auth::user()->image) }}" alt="AdminBSB - Profile Image" style="width:50px;height:50px" />
                    @else
                        <img src="{{url('dashboard/images/user.png')}}" alt="AdminBSB - Profile Image" style="width:50px;height:50px" />
                    @endif
                </div>
                <div class="info-container">

                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1) Admin @endif
                        @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2) HR @endif
                        @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 3) FR @endif
                        @if(Auth::user()->role == 3) Secratry @endif
                        @if(Auth::user()->role == 2) Doctor @endif
                    </div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 1)
                            <li><a href="{{url('/dashboard/admin/profile')}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif
                            @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 2)
                            <li><a href="{{url('/dashboard/hr/profile')}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif
                            @if(Auth::user()->role == 1 && get_second_role(Auth::user()->id) == 3)
                            <li><a href="{{url('/dashboard/fr/profile')}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif
                            @if(Auth::user()->role == 3)
                            <li><a href="{{url('/dashboard/secratry/profile')}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif
                            @if(Auth::user()->role == 2)
                            <li><a href="{{url('/dashboard/doctor/profile')}}"><i class="material-icons">person</i>Profile</a></li>
                            @endif
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/')}}"><i class="material-icons">favorite</i>Website</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('dashboard/logout')}}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                
                @include('dashboard.layout.menu')   
            
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; {{ date("Y", strtotime(now())) }} Clinic  - <a target="blank" href="https://github.com/mohamedAbdelety/sw2_clinic">Abdelaty Team</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">{{trans('common.staff')}}</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        
                        <?php
                            $helper = App\helper\helper::getInstance();
                            $users = $helper->get_all_stff();
                        ?>
                        @foreach($users as $user)
                        <li style="padding-bottom: 25px;">
                            
                                <div class="image">
                                @if($user->image != null)
                                <img src="{{ Storage::url($user->image) }}" alt="AdminBSB - Profile Image" style="width:50px;height:50px" />
                                @else
                                <img src="{{url('dashboard/images/user.png')}}" alt="AdminBSB - Profile Image" style="width:50px;height:50px" />
                                @endif
                                </div>
                                <span style="margin-left: 25px;">{{$user->name}}</span>
                           
                            @if($user->role != 1)
                                <span class="">{{get_role($user->role)}}</span>
                             @else
                               @if(get_second_role($user->id) == 2)
                                <span class="">HR</span>
                               @else
                                <span class="">FR</span>
                               @endif 
                             @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>