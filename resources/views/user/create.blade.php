@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h4>Tạo mới người dùng</h4>
        </div>
        <div class="row justify-content-start">
            <div class="col-lg-12">
                <div class="card">
                    <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body row">
                            <div class="col-4 mb-3">
                                <label for="name" class="form-label">
                                    Họ tên<span class="text-danger">*</span>
                                </label>
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}"
                                    placeholder="Nhập tên phòng ban">
                                {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Chọn vai trò <span class="text-danger">*</span></label>
                                <select name="role_id[]" class="form-select">
                                    {!! $roles !!}
                                </select>
                                {!! $errors->first('role_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Ngày sinh <span class="text-danger">*</span></label>
                                <input name="birthday" type="date" class="form-control" value="{{ old('birthday') }}"
                                    placeholder="Nhập ngày sinh">
                                {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input name="phone_number" type="text" class="form-control"
                                    value="{{ old('phone_number') }}" placeholder="Nhập số điện thoại">
                                {!! $errors->first('phone_number', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Chọn phòng ban <span class="text-danger">*</span></label>
                                <select name="department_id" class="form-select">
                                    {!! $departments !!}
                                </select>
                                {!! $errors->first('department_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Chọn vị trí/ chức danh <span class="text-danger">*</span></label>
                                <select name="position_id" class="form-select">
                                    {!! $positions !!}
                                </select>
                                {!! $errors->first('position_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input name="email" type="text" class="form-control" value="{{ old('email') }}"
                                    placeholder="Nhập email">
                                {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label">Chọn giới tính <span class="text-danger">*</span></label>
                                <select name="gender" class="form-select">
                                    {!! $genders !!}
                                </select>
                                {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Tên tài khoản <span class="text-danger">*</span></label>
                                <input name="username" type="text" class="form-control" value="{{ old('username') }}"
                                    placeholder="Nhập username">
                                {!! $errors->first('username', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
                                {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>
                        <button class="btn btn-primary ms-3 mb-3">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
@stop
