<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="index-2.html" title="">
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
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    {{-- Dashboard --}}
                    @can('view dashboard')
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                                <i class="ri-home-line"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endcan

                    {{-- Product --}}
                    @canany(['products.view', 'products.create'])
                        <li class="sidebar-list">
                            <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                <i class="ri-store-3-line"></i>
                                <span>Product</span>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('products.view')
                                    <li>
                                        <a href="{{ route('productList') }}">Products</a>
                                    </li>
                                @endcan
                                @can('products.create')
                                    <li>
                                        <a href="{{ route('addProductshow') }}">Add New Products</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    {{-- Users --}}
                    @canany(['users.view', 'users.create'])
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i class="ri-user-3-line"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('users.view')
                                    <li>
                                        <a href="{{ route('userList') }}">All Users</a>
                                    </li>
                                @endcan
                                @can('users.create')
                                    <li>
                                        <a href="{{ route('createUser') }}">Add New User</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    {{-- Roles --}}
                    @canany(['roles.view', 'roles.create'])
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i class="ri-user-3-line"></i>
                                <span>Roles</span>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('roles.view')
                                    <li>
                                        <a href="{{ route('roles.index') }}">All Roles</a>
                                    </li>
                                @endcan
                                @can('roles.create')
                                    <li>
                                        <a href="{{ route('roles.create') }}">Create Role</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    {{-- FAQ --}}
                    @canany(['fqa.view', 'fqa.create'])
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                <i class="fa fa-question-circle"></i>
                                <span>FAQ</span>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('fqa.view')
                                    <li>
                                        <a href="{{ route('fqaList') }}">All FAQs</a>
                                    </li>
                                @endcan
                                @can('fqa.create')
                                    <li>
                                        <a href="{{ route('fqa.show') }}">Create FAQ</a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    {{-- Settings --}}
                    @can('settings.manage')
                        <li class="sidebar-list">
                            <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                <i class="ri-settings-line"></i>
                                <span>Settings</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li>
                                    <a href="{{ route('settings.profile.edit') }}">Profile Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('settings.mail.edit') }}">Mail Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('web-setting.edit') }}">Web Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('app-setting.edit') }}">App Setting</a>
                                </li>
                                <li>
                                    <a href="{{ route('payment-gateway.edit') }}">Stripe Setting</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
