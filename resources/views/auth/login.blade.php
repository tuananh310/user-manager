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
                                    <h2 class="text-center">Đăng nhập</h2>
                                    <div class="p-2">

                                        <form method="POST" action="{{ route('auth.get.store') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Email</label>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="Nhập username" value="{{ old('username') }}">
                                                @if($errors->has('username'))
                                                    <div class="invalid-feedback d-block">
                                                        {{ $errors->first('username') }}
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('script')
    <script src="{{ mix('js/login.js', "statics/assets") }}"></script>
@stop
