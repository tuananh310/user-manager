@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-sm-between">
                <h3>Vị trí</h3>
                <a class="btn btn-primary" href="{{ route('admin.position.create') }}">Thêm mới</a>
            </div>
            <div class="data-content mt-3">
                <table class="table table-nowrap table-striped mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Tên vị trí</th>
                            <th scope="col">Cấp trên</th>
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
                                        <a class="btn btn-primary me-2" href="{{ route('admin.position.edit', $data->id) }}">Sửa</a>
                                        <form action="{!! route('admin.position.destroy', $data->id) !!}" method="POST" style="display: inline-block">
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
