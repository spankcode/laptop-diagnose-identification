<nav class="layout-navbar container-xxl navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar"
    style="position: sticky; top: 0">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <div class="text-end me-2">
                <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                <small class="d-block">{{ auth()->user()->email }}</small>
            </div>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online mb-2">
                        <i class="bx bxs-user p-2"
                            style="font-size: 2em; background-color: #7695da; color: white; padding: 3px; border-radius: 50%;"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-item">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">{{ auth()->user()->name }}</span>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item btn-logout" href="javascript:void(0);">
                            <form action="/logout" method="POST" id="logoutForm">
                                @csrf
                            </form>
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
