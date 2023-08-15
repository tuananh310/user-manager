@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h4>Chỉnh sửa phòng ban</h4>
        </div>
        <div class="row justify-content-start">
            <div class="col-lg-6">
                <div class="card">
                    <form class="d-flex" method="POST"
                        action="{{ route('admin.department.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="col-12 mb-3">
                                <label for="product_interested_in" class="form-label">
                                    Tên phòng ban
                                </label>
                                <input name="name" type="text" class="form-control" value="{{ old('name') ?? $data->name }}"
                                    placeholder="Nhập tên phòng ban">
                                {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_interested_in" class="form-label">
                                    Phòng ban cha
                                </label>
                                <select name="parent_id" class="form-control" data-placeholder="Select">
                                    {!! $parents !!}
                                </select>
                                {!! $errors->first('parent_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-12 mb-3">
                                <label for="product_interested_in" class="form-label">
                                    Mô tả
                                </label>
                                <textarea name="description" class="form-control" id="ckeditor" rows="3"
                                    placeholder="Nhập mô tả">{{ old('description') ?? $data->description }}</textarea>
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
