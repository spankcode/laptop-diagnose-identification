<!DOCTYPE html>
<html lang="en" data-theme="theme-default" data-assets-path="">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sistem Pakar Diagnosa Kerusakan Komputer | Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/logo.svg') }}" /> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/style.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    @if (session()->has('success'))
        <div class="flash-data" data-flash="{{ session('success') }}"></div>
    @endif
    @if (session()->has('failed'))
        <div class="flash-data-failed" data-flash="{{ session('failed') }}"></div>
    @endif
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('dashboard.partials.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('dashboard.partials.navbar')
                <!-- / Navbar -->

                <div class="mt-4 ms-4 ps-1 align-items-center">
                    @php
                        $currentRoute = request()->path();
                    @endphp
                    <div class="d-flex text-white align-items-center">
                        @if ($currentRoute === 'dashboard')
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                </li>
                            </ol>
                        @elseif(str_starts_with($currentRoute, 'dashboard/gejala'))
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"> Dashboard </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gejala
                                    <i class="menu-icon tf-icons bx bx-error-circle"></i>
                                </li>
                            </ol>
                        @elseif(str_starts_with($currentRoute, 'dashboard/kerusakan'))
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"> Dashboard </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Kerusakan
                                    <i class="menu-icon tf-icons bx bx-wrench"></i>
                                </li>
                            </ol>
                        @elseif(str_starts_with($currentRoute, 'dashboard/aturan'))
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"> Dashboard </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Aturan
                                    <i class="bx bx-cog me-2"></i>
                                </li>
                            </ol>
                        @elseif(str_starts_with($currentRoute, 'dashboard/os'))
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"> Dashboard </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    OS
                                    <i class="menu-icon tf-icons bx bx-devices"></i>
                                </li>
                            </ol>
                        @elseif($currentRoute === 'dashboard/konsultasi')
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard"> Dashboard </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Konsultasi
                                    <i class="menu-icon tf-icons bx bx-file-blank"></i>
                                </li>
                            </ol>
                        @endif
                    </div>
                </div>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © Copyright
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                made by
                                <a href="https://github.com/spankcode" class="footer-link fw-bolder">spankcode.com</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build: assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- DataTables JS -->
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <!-- SweetAlertJS -->
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>

    <!-- Numeral JS -->
    <script src="{{ asset('assets/js/numeral-2.0.6-min.js') }}"></script>

    <!-- Script JS -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @yield('script')
</body>

</html>
