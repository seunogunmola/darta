            <!--start header -->
            <header>
                <div class="topbar d-flex align-items-center">
                    <nav class="navbar navbar-expand">
                        <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                        </div>
                        <div class="search-bar flex-grow-1">

                        </div>
                        <div class="top-menu ms-auto">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-notifications-list">

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="header-message-list">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>                        

                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/noimage.jpg') }}" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ Auth::user()->fullname }}</p>
                                    <p class="designattion mb-0">{{ ucfirst(auth()->user()->usertype) }}</p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="javascript:;">
                                    <i class="bx bx-user"></i><span>Profile</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">
                                    <i class="bx bx-cog"></i><span>Settings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">
                                    <i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">
                                    <i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">
                                    <i class='bx bx-download'></i><span>Downloads</span></a>
                                </li>
                                <li>
                                    <div class="dropdown-divider mb-0"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('retailer.logout') }}" onclick="return confirm('Are You Sure You want to Logout?') ">
                                        <i class='bx bx-log-out-circle'></i><span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <!--end header -->