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
                        <a href="{{ route('retailer.dashboard') }}">
                            <div class="parent-icon"><i class='bx bx-home-circle'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="has-arrow">
                            <div class="parent-icon"><i class="bx bx-cart"></i>
                            </div>
                            <div class="menu-title">Orders</div>
                        </a>
                        <ul>
                            <li> <a href="{{ route('retailer.orders.create') }}"><i class="bx bx-right-arrow-alt"></i>Create Order</a></li>
                            <li> <a href="{{ route('retailer.orders.list') }}"><i class="bx bx-right-arrow-alt"></i>View Orders</a></li>
                        </ul>
                    </li>                    
                </ul>
                <!--end navigation-->
            </div>
            <!--end sidebar wrapper -->