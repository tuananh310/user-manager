@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-sm-between">
                <h3>Phòng ban</h3>
                <a class="btn btn-primary" href="{{ route('admin.department.create') }}">Thêm mới</a>
            </div>
            <div class="data-content mt-3">
                <table class="table table-nowrap table-striped mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Tên phòng ban</th>
                            <th scope="col">Phòng ban cha</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ optional($data->parent)->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary me-2" href="{{ route('admin.department.edit', $data->id) }}">Sửa</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="btn btn-danger text-white" href="javascript:void(0)" data-token="{{ csrf_token() }}"
                                            data-method="POST"
                                            data-action="{{ route('admin.department.delete', ['id' => $data->id]) }}">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('script')
@stop
