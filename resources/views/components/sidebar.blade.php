<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/" class="logo logo-dark">
            <h4 class="mt-4 text-muted">Nhựa Tiền Phong</h4>
        </a>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            @php
                $routeName = \Request::route()->getName();
            @endphp
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{$routeName == 'admin.user.index' ? 'active' : ''}}" href="{{ route('admin.user.index') }}">
                        {{-- <i class="bi bi-person-bounding-box customer-icon"></i> --}}
                        <span data-key="t-overview">Danh sách người dùng</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{$routeName == 'admin.department.index' ? 'active' : ''}}" href="{{ route('admin.department.index') }}">
                        {{-- <i class="bi bi-person-bounding-box customer-icon"></i> --}}
                        <span data-key="t-overview">Danh sách phòng ban</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{$routeName == 'admin.position.index' ? 'active' : ''}}" href="{{ route('admin.position.index') }}">
                        {{-- <i class="bi bi-person-bounding-box customer-icon"></i> --}}
                        <span data-key="t-overview">Danh sách vị trí</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
