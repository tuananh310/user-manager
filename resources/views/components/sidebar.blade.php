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
                $routeName = \Request::route()->getName()
            @endphp
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ in_array($routeName, ['dashboard.data.index', 'dashboard.data_etsy.index', 'dashboard.inventory.index']) ? 'active collapsed' : '' }}" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                        <i class="bi bi-box-seam"></i> <span data-key="t-products">Dasboard</span>
                    </a>
                    <div class="collapse menu-dropdown {{ in_array($routeName, ['dashboard.data.index', 'dashboard.data_etsy.index', 'dashboard.inventory.index']) ? 'show' : '' }}" id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a href="{{route('dashboard.import.index')}}" class="nav-link {{ $routeName == 'dashboard.import.index' ? 'active' : '' }}" data-key="t-list-view">Import</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{route('dashboard.data.index')}}" class="nav-link {{ $routeName == 'dashboard.data.index' ? 'active' : '' }}" data-key="t-list-view">Data</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{route('dashboard.data_etsy.index')}}" class="nav-link {{ $routeName == 'dashboard.data_etsy.index' ? 'active' : '' }}" data-key="t-grid-view">Data etsy</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{route('dashboard.inventory.index')}}" class="nav-link {{ $routeName == 'dashboard.inventory.index' ? 'active' : '' }}" data-key="t-overview">Tồn kho</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                        <i class="bi bi-box-seam"></i> <span data-key="t-products">Products</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProducts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="product-list.html" class="nav-link" data-key="t-list-view">List View</a>
                            </li>
                            <li class="nav-item">
                                <a href="product-grid.html" class="nav-link" data-key="t-grid-view">Grid View</a>
                            </li>
                            <li class="nav-item">
                                <a href="product-overview.html" class="nav-link" data-key="t-overview">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a href="product-create.html" class="nav-link" data-key="t-create-product">Create Product</a>
                            </li>
                            <li class="nav-item">
                                <a href="categories.html" class="nav-link" data-key="t-categories">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="sub-categories.html" class="nav-link" data-key="t-sub-categories">Sub Categories</a>
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
