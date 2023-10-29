          <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('dashboard') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{asset ('images/logo.png') }}" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{asset ('images/logo.png') }}" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="ri-menu-line"></i>
                    </button>
                
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">{{ Auth::user()->name }} <i
                                        class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            {{-- <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="pages-faq.html" class="dropdown-item">
                                <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="auth-lock-screen.html" class="dropdown-item">
                                <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                                <span>Lock Screen</span>
                            </a> --}}

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    
    <div class="leftside-menu">

            <!-- Brand Logo Dark -->
            <a href="{{ url('dashboard') }}" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="{{asset ('images/logo.jpeg') }}" alt="dark logo" style="height: 50px;">
                </span>
                <span class="logo-sm">
                    <img src="{{asset ('images/logo.png') }}" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="{{ url('dashboard') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span> Dashboard </span>
                        </a>
                    </li>
                  
                    <li class="side-nav-item">
                        <a
                            data-bs-toggle="collapse"
                            href="#sidebarPages"
                            aria-expanded="false"
                            aria-controls="sidebarPages"
                            class="side-nav-link"
                        >
                            <i class=""></i>
                            <span> Applicant </span>
                            <span class="menu-arrow"></span>
                        </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                <li>
                                    <a href="{{ route('applicant.index') }}">
                                        <span> New Applicant List </span>
                                    </a>
                                </li>
                                <li>
                                     <a href="{{ route('applicant.rejected') }}">
                                         <span> Rejected Applicant List </span>
                                    </a>
                                </li>
                                
                                </ul>
                            </div>
                     </li>
                    <li class="side-nav-item">
                        <a href="{{ route('applicant.admit.list') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span> Admit Card </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ route('dashboard.exam.index') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span>Exam </span>
                        </a>
                    </li>

                     <li class="side-nav-item">
                        <a href="{{ route('dashboard.user.index') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span>User List</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ route('exam-center.index') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span>Exam Center</span>
                        </a>
                    </li>

                     <li class="side-nav-item">
                        <a href="{{ route('university.index') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span>University</span>
                        </a>
                    </li>
                     <li class="side-nav-item">
                        <a href="{{ route('center.index') }}" class="side-nav-link">
                            <i class=""></i>
                            {{-- <span class="badge bg-success float-end">9+</span> --}}
                            <span>Center Data</span>
                        </a>
                    </li>

               

                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->