<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="\"><i class="fa fa-home"></i><span class="right-nav-text">{{trans('mainSideBar.Dashboard')}}</span> </a>

                            {{-- <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('mainSideBar.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div> --}}
                        </a>
                       
                    </li>
                  
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa fa-th-large"></i><span
                                    class="right-nav-text">{{ trans('mainSideBar.schoolGrades') }}</span></div>
                            <div class="pull-right"><i class="fa fa-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Grades.index') }}">{{ trans('MainSideBar.schoolGradesList') }}</a></li>
                       
                        </ul>
                    </li>
                            <!-- menu item Elements-->
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-building"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Classes') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-navicon"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.sections') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-graduation-cap"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.students') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-group"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.teachers') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-user-secret"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.parents') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-calculator"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Accounting') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-calendar"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Attendance') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-copy"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Exams') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-book"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Library') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-video-camera"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Online') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-cog"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Settings') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                        <div class="pull-left"><i class="fa fa-id-badge"></i><span
                                                class="right-nav-text">{{ trans('mainSideBar.Users') }}</span></div>
                                        <div class="pull-right"><i class="fa fa-plus"></i></div>
                                        <div class="clearfix"></div>
                                    </a>
                                    <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                        <li><a href="#">lorem ipsum</a></li>
                                    </ul>
                                </li>



                     <!-- menu title -->
                     {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li> --}}
                     <!-- menu item Widgets-->
                   
                  
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
