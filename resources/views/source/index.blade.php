@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-sm-between">
                <h3>Nguồn tuyển dụng</h3>
                <a class="btn btn-primary" href="{{ route('admin.source.create') }}">Thêm mới</a>
            </div>
            <div class="data-content mt-3">
                <table class="table table-nowrap table-striped mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Tên nguồn</th>
                            <th scope="col">Link</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->link }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary me-2" href="{{ route('admin.source.edit', $data->id) }}">Sửa</a>
                                        <form action="{!! route('admin.source.destroy', $data->id) !!}" method="POST" style="display: inline-block">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <button class="btn btn-danger text-white" type="submit">Xóa</button>
                                        </form>
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
