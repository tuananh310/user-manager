@extends('layouts.master_auth')

@section('css')

@stop

@section('content')
    <div class="container-fluid">
        <section class="auth-page-wrapper position-relative bg-light min-vh-100 d-flex align-items-center justify-content-between">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="auth-card mx-lg-3">
                            <div class="card border-0 mb-0">
                                <div class="card-body">
                                    <div class="logo text-center mb-2">
                                        <img src="{{ url('/assets/images/chicnchill-logo.png') }}" alt="" class="img-fluid" width="230">
                                    </div>
                                    <p class="text-muted fs-15 text-center">Đăng nhập để tiếp tục với ChicnChill Dashboard</p>
                                    <div class="p-2">

                                        <form method="POST" action="{{ route('auth.get.store') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập email" value="{{ old('email') }}">
                                                @if($errors->has('email'))
                                                    <div class="invalid-feedback d-block">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="password-input">Mật khẩu</label>
                                                <div class="position-relative auth-pass-inputgroup mb-3">
                                                    <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Nhập mật khẩu" id="password-input">
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon js-toggle-password" type="button">
                                                        <i class="ri-eye-fill align-middle"></i>
                                                    </button>
                                                    @if($errors->has('password'))
                                                        <div class="invalid-feedback d-block">
                                                            {{ $errors->first('password') }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-primary w-100" type="submit">ĐĂNG NHẬP</button>
                                            </div>
                                        </form>
                                        <div class="mt-3">
                                            <i class="bi bi-arrow-left d-inline-block mr-1"></i> Đi tới <a href="https://chicnchill.net/">ChicnChill</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <p class="mb-0 text-muted">©
                                    <script>document.write(new Date().getFullYear())</script> ChicnChill. Crafted with by ChicnChill
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </div>
@stop

@section('script')
    <script src="{{ mix('js/login.js', "statics/assets") }}"></script>
@stop
