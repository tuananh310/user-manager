@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h4>Tạo mới quyền</h4>
        </div>
        <div class="row justify-content-start">
            <div class="col-lg-12">
                <div class="card">
                    <form class="d-flex" method="POST"
                        action="{{ route('admin.role.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label">
                                    Tên quyền
                                </label>
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}"
                                    placeholder="Nhập tên phòng ban">
                                {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">
                                    Mô tả
                                </label>
                                <textarea name="description" class="form-control" id="ckeditor" rows="3"
                                    placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                            </div>
                            <div class="row">
                                @foreach ($routeGroups as $groupKey => $routes)
                                    <div class="col-4">
                                        <div class="mb-2 d-flex align-items-center">
                                            <h3 class="mb-0">{{ __('route.' . $groupKey) }}</h3>
                                        </div>
                                        <ul class="list-unstyled">
                                            @foreach ($routes as $routeName)
                                                <li class="form-check">
                                                    <input type="checkbox" name="selected_routes[]" value="{{ $routeName }}"
                                                        id="{{ $routeName }}" class="form-check-input">
                                                    <label for="{{ $routeName }}"
                                                        class="form-check-label">{{ __('route.' . $routeName) }}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn btn-primary btn-import-excel">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
@stop
