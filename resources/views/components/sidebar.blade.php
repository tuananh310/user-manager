<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/admin" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ url('assets/images/chicnchill-logo-light.png') }}" alt="" height="40">
            </span>
            <span class="logo-lg">
                <img src="{{ url('assets/images/chicnchill-logo.png') }}" alt="" height="40">
            </span>
        </a>
        <a href="/admin" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ url('assets/images/chicnchill-logo-light.png') }}" alt="" height="38">
            </span>
            <span class="logo-lg">
                <img src="{{ url('assets/images/chicnchill-logo.png') }}" alt="" height="38">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
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
                    <a class="nav-link menu-link {{$routeName == 'customer.list' ? 'active' : ''}}" href="{{ route('customer.list') }}">
                        <i class="bi bi-person-bounding-box customer-icon"></i>
                        <span data-key="t-overview">Customer List</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ in_array($routeName, ['dashboard.data.index']) ? 'active collapsed' : '' }}"
                        href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarProducts">
                        <i class="bi bi-box-seam"></i> <span data-key="t-products">Customer Data</span>
                    </a>
                    <div class="collapse menu-dropdown {{ in_array($routeName, ['dashboard.data.index']) ? 'show' : '' }}"
                        id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.data.index') }}"
                                    class="nav-link {{ $routeName == 'dashboard.data.index' ? 'active' : '' }}"
                                    data-key="t-list-view">Data</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>
