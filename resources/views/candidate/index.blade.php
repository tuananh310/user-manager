@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-sm-between">
                <h3>Ứng viên</h3>
                <div class="d-flex">
                    <a class="btn btn-primary me-2" href="{{ route('admin.candidate.create') }}">Thêm mới</a>
                    <form class="d-flex" method="POST"
                        action="{{ route('admin.candidate.import_excel') }}" enctype="multipart/form-data">
                        @csrf
                        <input name="excel_file" type="file" class="form-control" required>
                        <button class="btn btn-primary me-2" style="text-wrap: nowrap;">Import Excel</button>
                    </form>
                    <a class="btn btn-primary me-2" href="{{ route('admin.candidate.create') }}">File excel mẫu</a>
                    <a class="btn btn-primary me-2" href="{{ route('admin.candidate.create') }}">Export excel</a>
                </div>
            </div>
            <div class="data-content mt-3">
                <table class="table table-nowrap table-striped mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Hành động</th>
                            <th scope="col">#</th>
                            <th scope="col">Họ tên ứng viên</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Vị trí ứng tuyển</th>
                            <th scope="col">Đơn vị</th>
                            <th scope="col">Ngày nhận hồ sơ</th>
                            <th scope="col">Người nhận hồ sơ</th>
                            <th scope="col">Nguồn hồ sơ</th>
                            <th scope="col">Ghi chú mối quan hệ</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Hộ khẩu</th>
                            <th scope="col">Nơi ở hiện tại</th>
                            <th scope="col">Nơi ở (chi tiết)</th>
                            <th scope="col">Trình độ</th>
                            <th scope="col">Hệ</th>
                            <th scope="col">Chuyên ngành học</th>
                            <th scope="col">Trường đào tạo</th>
                            <th scope="col">Xếp loại</th>
                            <th scope="col">Tiếng anh</th>
                            <th scope="col">Ngoại ngữ khác</th>
                            <th scope="col">Phần mềm khác</th>
                            <th scope="col">Thông tin tham chiếu 1</th>
                            <th scope="col">Thông tin tham chiếu 2</th>
                            <th scope="col">Kinh nghiệm làm việc</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-primary me-2"
                                            href="{{ route('admin.candidate.edit', $data->id) }}">Sửa</a>
                                        <form action="{!! route('admin.candidate.destroy', $data->id) !!}" method="POST" style="display: inline-block">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!}
                                            <button class="btn btn-danger text-white" type="submit">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->birthday }}</td>
                                <td>{{ $data->position?->name }}</td>
                                <td>{{ $data->department?->name }}</td>
                                <td>{{ date('d/m/Y', strtotime($data->received_time)) }}</td>
                                <td>{{ $data->receive?->name }}</td>
                                <td>{{ $data->source?->name }}</td>
                                <td>{{ $data->relationship_note }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->phone_number }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->households?->name }}</td>
                                <td>{{ $data->addresses?->name }}</td>
                                <td>{{ $data->address_detail }}</td>
                                <td>{{ $data->level }}</td>
                                <td>{{ $data->branch }}</td>
                                <td>{{ $data->major }}</td>
                                <td>{{ $data->training_place }}</td>
                                <td>{{ $data->rank }}</td>
                                <td>{{ $data->english }}</td>
                                <td>{{ $data->other_language }}</td>
                                <td>{{ $data->other_software }}</td>
                                <td>{{ $data->info1 }}</td>
                                <td>{{ $data->info2 }}</td>
                                <td>{{ $data->experience }}</td>
                                <td>{{ $data->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@stop
