<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="index-2.html" data-bs-original-title="" title="">
                <img class="img-fluid for-white" src="assets/images/logo/full-white.png" alt="logo">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ url('index-2.html') }}">
                <img class="img-fluid main-logo main-white" src="{{ asset('assets/images/logo/logo.png') }}"
                    alt="logo">
                <img class="img-fluid main-logo main-dark" src="{{ asset('assets/images/logo/logo-white.png') }}"
                    alt="logo">
            </a>

        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="index-2.html">
                            <i class="ri-home-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-store-3-line"></i>
                            <span>Product</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('productList') }}">Prodcts</a>
                            </li>

                            <li>
                                <a href="{{ route('addProductshow') }}">Add New Products</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ route('userList') }}">All users</a>
                            </li>
                            <li>
                                <a href="{{ route('createUser') }}">Add new user</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-user-3-line"></i>
                            <span>Roles</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="role.html">All roles</a>
                            </li>
                            <li>
                                <a href="create-role.html">Create Role</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="media.html">
                            <i class="ri-price-tag-3-line"></i>
                            <span>Media</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                            <i class="ri-settings-line"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="profile-setting.html">Profile Setting</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
