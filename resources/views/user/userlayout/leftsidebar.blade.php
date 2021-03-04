BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="{{route('user.dashboard')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="arrow"></span>
                            </a>
                            
                        </li>

                        <li class="nav-item start ">
                            <a href="{{route('user.register_form')}}" class="nav-link nav-toggle">
                                <i class="fa fa-user-plus"></i>
                                <span class="title">My Profile</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <!-- <li class="nav-item start ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-bell"></i>
                                <span class="title">Notification</span>
                                <span class="arrow"></span>
                            </a>
                        </li> -->
                        <li class="nav-item start ">
                            <a href="{{route('user.user_trade')}}" class="nav-link nav-toggle">
                                <i class="fa fa-trademark"></i>
                                <span class="title">Trades</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <!-- <li class="nav-item start ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-inr"></i>
                                <span class="title">My Bonus</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-history"></i>
                                <span class="title">History</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-question"></i>
                                <span class="title">Help</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="fa fa-comment"></i>
                                <span class="title">Feedback</span>
                                <span class="arrow"></span>
                            </a>
                        </li> -->
                        

                     
                        
                       
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR