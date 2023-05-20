            <!--sidebar wrapper -->
            <div class="sidebar-wrapper" data-simplebar="true">
                <div class="sidebar-header">
                    <div>
                        <img src="{{ asset('assets/favicon.svg') }}" class="logo-icon" alt="logo icon">
                    </div>
                    <div>
                        <h4 class="logo-text">Darta</h4>
                    </div>
                    <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                    </div>
                </div>
                <!--navigation-->
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title">Retailers</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('retailers.list') }}"><i class="bx bx-right-arrow-alt"></i>View Retailers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-cart"></i>
                            </div>
                            <div class="menu-title">Products</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('products.list') }}"><i class="bx bx-right-arrow-alt"></i>View Products</a></li>
                            <li> <a href="{{ route('products.create') }}"><i class="bx bx-right-arrow-alt"></i>Create Product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title">Distributors</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('distributor.list') }}"><i class="bx bx-right-arrow-alt"></i>View Distributors</a></li>
                            <li> <a href="{{ route('distributor.create') }}"><i class="bx bx-right-arrow-alt"></i>Create Distributor</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-map-alt"></i>
                            </div>
                            <div class="menu-title">Regions</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('regions.list') }}"><i class="bx bx-right-arrow-alt"></i>View Regions</a></li>
                            <li> <a href="{{ route('regions.create') }}"><i class="bx bx-right-arrow-alt"></i>Create Region</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-map"></i>
                            </div>
                            <div class="menu-title">States</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('states.list') }}"><i class="bx bx-right-arrow-alt"></i>View States</a></li>
                            <li> <a href="{{ route('states.create') }}"><i class="bx bx-right-arrow-alt"></i>Create State</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title">Admin Users</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('users.list') }}"><i class="bx bx-right-arrow-alt"></i>View Admin Users</a></li>
                            <li> <a href="{{ route('users.create') }}"><i class="bx bx-right-arrow-alt"></i>Create Admin User</a></li>
                        </ul>
                    </li>
                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->