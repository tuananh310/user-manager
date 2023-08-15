@php use Illuminate\Support\Facades\Auth; @endphp
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="dropdown topbar-head-dropdown ms-1 header-item dropdown-hover-end">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-sun align-middle fs-20"></i>
                    </button>
                    <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                        <a href="#!" class="dropdown-item" data-mode="light"><i class="bi bi-sun align-middle me-2"></i>
                            Defualt (light mode)</a>
                        <a href="#!" class="dropdown-item" data-mode="dark"><i class="bi bi-moon align-middle me-2"></i>
                            Dark</a>
                        <a href="#!" class="dropdown-item" data-mode="auto"><i
                                    class="bi bi-moon-stars align-middle me-2"></i> Auto (system defualt)</a>
                    </div>
                </div>
                @if(Auth::check())
                    <div class="dropdown ms-sm-3 header-item topbar-user topbar-head-dropdown dropdown-hover-end">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                             @if (auth()->user()->image)
                                <img class="rounded-circle header-profile-user"
                                     src="{{ auth()->user()->image_url ?? '' }}"
                                     alt="Avatar">
                            @endif
                            <span class="text-start">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name ?? '' }}</span>
                                <span class="d-none d-xl-block ms-1 fs-13 user-name-sub-text">Admin</span>
                            </span>
                        </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route('auth.get.logout') }}">
                                <i class="bi bi-box-arrow-right text-muted fs-15 align-middle me-1"></i>
                                <span class="align-middle" data-key="t-logout">Đăng xuất</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
