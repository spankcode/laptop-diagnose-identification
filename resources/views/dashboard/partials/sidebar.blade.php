<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand text-center">
        <a href="/dashboard" class="app-brand-link">
            <h4 class="app-brand-text demo menu-text fw-bolder mt-4">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" style="fill: #566a7f; transform: ;msFilter:;"><path d="m21.512 6.112-3.89 3.889-3.535-3.536 3.889-3.889a6.501 6.501 0 0 0-8.484 8.486l-6.276 6.275a.999.999 0 0 0 0 1.414l2.122 2.122a.999.999 0 0 0 1.414 0l6.275-6.276a6.501 6.501 0 0 0 7.071-1.414 6.504 6.504 0 0 0 1.414-7.071z"></path></svg> --}}
                DASHBOARD
            </h4>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>

        <!-- Gejala -->
        <li class="menu-item {{ Request::is('dashboard/gejala*') ? 'active' : '' }}">
            <a href="/dashboard/gejala" class="menu-link">
                <i class="menu-icon tf-icons bx bx-error-circle"></i>
                <div>Gejala</div>
            </a>
        </li>

        <!-- Kerusakan -->
        <li class="menu-item {{ Request::is('dashboard/kerusakan*') ? 'active' : '' }}">
            <a href="/dashboard/kerusakan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-wrench"></i>
                <div>Kerusakan</div>
            </a>
        </li>

        <!-- Aturan -->
        <li class="menu-item {{ Request::is('dashboard/aturan*') ? 'active' : '' }}">
            <a href="/dashboard/aturan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div>Aturan</div>
            </a>
        </li>

        <!-- Operating System -->
        <li class="menu-item {{ Request::is('dashboard/os*') ? 'active' : '' }}">
            <a href="/dashboard/os" class="menu-link">
                <i class="menu-icon tf-icons bx bx-devices"></i>
                <div>Operating System</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Konsultasi</span>
        </li>

        <!-- Konsultasi -->
        <li class="menu-item {{ Request::is('dashboard/konsultasi') ? 'active' : '' }}">
            <a href="/dashboard/konsultasi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file-blank"></i>
                <div>Konsultasi</div>
            </a>
        </li>
    </ul>
</aside>