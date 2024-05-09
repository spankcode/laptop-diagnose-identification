<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free" >
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no minimum-scale=1.0, maximum-scale=1.0" />
        <title> Digital Waiter | Login</title>
        <meta name="description" content="" />
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/logo.svg') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/login-style.css') }}" />
    </head>

    <body>
        <section class="login d-flex align-items-center">
            @if (session()->has('failed'))
                <div class="flash-data" data-flash="{{ session('failed') }}"></div>
            @endif
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <h1 class="fw-bold text-center pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 30 30" style="fill: rgb(86, 106, 127);transform: ;msFilter:;"><path d="M21 10H3a1 1 0 0 0-1 1 10 10 0 0 0 5 8.66V21a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1.34A10 10 0 0 0 22 11a1 1 0 0 0-1-1zM9 9V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 7 3V2H5v1a4.51 4.51 0 0 0 1.28 3.17A2.49 2.49 0 0 1 7 7.93V9zm4 0V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 11 3V2H9v1a4.51 4.51 0 0 0 1.28 3.15A2.49 2.49 0 0 1 11 7.93V9zm4 0V7.93a4.51 4.51 0 0 0-1.28-3.15A2.49 2.49 0 0 1 15 3V2h-2v1a4.51 4.51 0 0 0 1.28 3.15A2.49 2.49 0 0 1 15 7.93V9z"></path></svg>DIGITAL WAITER</h1>
                        @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <main class="form-signin text-center">
                            <form action="/login" method="POST">
                                @csrf
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="" required autocomplete="off">
                                    <label for="username">Username</label>
                                    @error('username')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror mb-0" id="password" placeholder="" required>
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="invalid-feedback text-start">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-start">
                                    <input type="checkbox" id="showPassword" class="form-check-input btn-show">
                                    <label for="showPassword" class="form-check-label">Show password</label>
                                </div>
                                <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
            <div class="credentials">
                <a href="javascript:void(0)" class="btn-guide">User Guide</a>
                <a href="javascript:void(0)" class="btn-credit ms-2">Credentials</a>
                <a href="https://wa.me/6281283890098" target="_blank" class="ms-2">Help</a>
            </div>
        </section>

        <div class="modal fade" id="credentialModal" tabindex="-1" aria-labelledby="credentialModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="credentialModalLabel">Credentials</h1>
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li class="mb-3">Operational (Waiter)
                                <ul>
                                    <li>Username: operational</li>
                                    <li>Password: operational</li>
                                </ul>
                            </li>
                            <li class="mb-3">Finance (Cashier)
                                <ul>
                                    <li>Username: finance</li>
                                    <li>Password: finance</li>
                                </ul>
                            </li>
                            <li class="mb-3">Management
                                <ul>
                                    <li>Username: management</li>
                                    <li>Password: management</li>
                                </ul>
                            </li>
                            <li class="mb-3">Administrator
                                <ul>
                                    <li>Username: administrator</li>
                                    <li>Password: administrator</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="guideModal" tabindex="-1" aria-labelledby="guideModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h1 class="modal-title fs-5" id="guideModalLabel">Guide</h1>
                    </div> --}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-4">
                                <h5>Operational Guide</h5>
                                <div class="text-center mt-2">
                                    <video class="w-100" style="height: 300px" controls>
                                        <source src="{{ asset('assets/video/Digital Waiter - Operational.mp4') }}" type="video/mp4">
                                        <source src="{{ asset('assets/video/Digital Waiter - Operational.mp4') }}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <h5>Finance Guide</h5>
                                <div class="text-center mt-2">
                                    <video class="w-100" style="height: 300px" controls>
                                        <source src="{{ asset('assets/video/Digital Waiter - Finance.mp4') }}" type="video/mp4">
                                        <source src="{{ asset('assets/video/Digital Waiter - Finance.mp4') }}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <h5>Management Guide</h5>
                                <div class="text-center mt-2">
                                    <video class="w-100" style="height: 300px" controls>
                                        <source src="{{ asset('assets/video/Digital Waiter - Management.mp4') }}" type="video/mp4">
                                        <source src="{{ asset('assets/video/Digital Waiter - Management.mp4') }}" type="video/ogg">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core JS -->
        <!-- build: assets/vendor/js/core.js -->
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
        <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
        
        <!-- SweetAlertJS -->
        <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

        <script>
            $(document).on('click', '.btn-credit', function(e) {
                e.preventDefault();
                $('#credentialModal').modal('show');
            });

            $(document).on('click', '.btn-guide', function(e) {
                e.preventDefault();
                $('#guideModal').modal('show');
            });

            const flashData = $('.flash-data').data('flash');

            if (flashData) {
                Swal({
                    title: 'Failed',
                    text: flashData,
                    type: 'error'
                })
            }

            $(document).on('click', '.btn-show', function(e) {
                if ($(this).prop('checked') == true) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });
        </script>

    </body>

</html>

