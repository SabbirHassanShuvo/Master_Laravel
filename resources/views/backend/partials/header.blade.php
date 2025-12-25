<div class="page-header">
    <div class="header-wrapper m-0">
        <div class="header-logo-wrapper p-0">
            <div class="logo-wrapper">
                <a href="index-2.html">
                    <img class="img-fluid main-logo" src="assets/images/logo/1.png" alt="logo">
                    <img class="img-fluid white-logo" src="assets/images/logo/1-white.png" alt="logo">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                <a href="index-2.html">
                    <img class="user-profile rounded-circle"
                        src="{{ auth()->user()->photo ? asset('uploads/users/' . auth()->user()->photo) : asset('uploads/users/default.png') }}"
                        alt="User Image">
                </a>
            </div>
        </div>

        <h3>Hello {{ auth()->user()->name }}!</h3>
        <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <div class="mode">
                        <i class="ri-moon-line"></i>
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 me-0">
                    <div class="media profile-media">
                        <img class="user-profile rounded-circle"
                            src="{{ auth()->user()->photo ? asset('uploads/users/' . auth()->user()->photo) : asset('uploads/users/default.png') }}"
                            alt="User Image">
                        <div class="user-name-hide media-body">
                            <span>{{ auth()->user()->name }}</span>
                            <p class="mb-0 font-roboto">Admin<i class="middle ri-arrow-down-s-line"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{ route('userList') }}">
                                <i data-feather="users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.profile.edit') }}">
                                <i data-feather="settings"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <!-- Hidden logout form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            <!-- Logout link triggers modal -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i data-feather="log-out"></i>
                                <span>Log out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Modal Start -->
<div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h5 class="modal-title mb-3" id="logoutModalLabel">Logging Out</h5>
                <p>Are you sure you want to log out?</p>
                <div class="button-box mt-3">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirm-logout">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script>
    document.getElementById('confirm-logout').addEventListener('click', function() {
        document.getElementById('logout-form').submit();
    });
</script>
