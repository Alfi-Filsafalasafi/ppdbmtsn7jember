<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('img/mts7.png') }}" style="height: 32px; width:32px" alt="Logo">
                        <small style="font-size: 20px">PPDB MTS 7</small>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item @yield('dashboard')">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item @yield('students')">
                    <a href="{{ route('admin.students.index') }}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Pendaftar</span>
                    </a>
                </li>
                <li class="sidebar-title mt-3">Akun</li>

                <li class="sidebar-item">
                    <a href="#" id="logoutButton" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>
            </ul>
        </div>

        <button class="sidebar-toggler btn x">
            <i data-feather="x"></i>
        </button>
    </div>
</div>
