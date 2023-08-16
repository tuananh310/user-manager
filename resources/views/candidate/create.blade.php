@extends('layouts.master')

@section('css')
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css', 'statics/assets') }}"> --}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-3">
            <h4>Tạo mới ứng viên</h4>
        </div>
        <div class="row justify-content-start">
            <div class="col-lg-12">
                <div class="card">
                    <form method="POST" action="{{ route('admin.candidate.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">
                            <div class="col-3 mb-3">
                                <label for="name" class="form-label">
                                    Tên ứng viên<span class="text-danger">*</span>
                                </label>
                                <input name="name" type="text" class="form-control" value="{{ old('name') }}"
                                    placeholder="Nhập tên ứng viên">
                                {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày sinh <span class="text-danger">*</span></label>
                                <input name="birthday" type="date" class="form-control" value="{{ old('birthday') }}"
                                    placeholder="Nhập ngày sinh">
                                {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày nhận hồ sơ <span class="text-danger">*</span></label>
                                <input name="received_time" type="date" class="form-control" value="{{ old('received_time') }}"
                                    placeholder="Nhập ngày nhận hồ sơ">
                                {!! $errors->first('received_time', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">
                                    Người nhận hồ sơ<span class="text-danger">*</span>
                                </label>
                                <select name="receiver_id" class="form-select" data-placeholder="Select">
                                    {!! $users !!}
                                </select>
                                {!! $errors->first('receiver_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">
                                    Nguồn hồ sơ<span class="text-danger">*</span>
                                </label>
                                <select name="source_id" class="form-control select2" data-placeholder="Select">
                                    {!! $sources !!}
                                </select>
                                {!! $errors->first('source_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ghi chú mối quan hệ <span class="text-danger">*</span></label>
                                <input name="relationship_note" type="text" class="form-control"
                                    value="{{ old('relationship_note') }}" placeholder="Nhập ghi chú">
                                {!! $errors->first('relationship_note', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">
                                    Giới tính<span class="text-danger">*</span>
                                </label>
                                <select name="gender" class="form-select" data-placeholder="Select">
                                    {!! $genders !!}
                                </select>
                                {!! $errors->first('gender', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input name="phone_number" type="text" class="form-control"
                                    value="{{ old('phone_number') }}" placeholder="Nhập số điện thoại">
                                {!! $errors->first('phone_number', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input name="email" type="text" class="form-control" value="{{ old('email') }}"
                                    placeholder="Nhập email">
                                {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Hộ khẩu <span class="text-danger">*</span></label>
                                <select name="household" class="form-select" data-placeholder="Select">
                                    {!! $selectProvinces !!}
                                </select>
                                {!! $errors->first('household', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nơi ở hiện tại <span class="text-danger">*</span></label>
                                <select name="address" class="form-select" data-placeholder="Select">
                                    {!! $selectProvinces !!}
                                </select>
                                {!! $errors->first('address', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nơi ở (chi tiết) <span class="text-danger">*</span></label>
                                <input name="address_detail" type="text" class="form-control" value="{{ old('address_detail') }}"
                                    placeholder="Nhập nơi ở">
                                {!! $errors->first('address_detail', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Trình độ <span class="text-danger">*</span></label>
                                <select name="level" class="form-control" data-placeholder="Select">
                                    {!! $levels !!}
                                </select>
                                {!! $errors->first('level', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Đơn vị <span class="text-danger">*</span></label>
                                <select name="department_id" class="form-control" data-placeholder="Select">
                                    {!! $departments !!}
                                </select>
                                {!! $errors->first('department_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Vị trí ứng tuyển <span class="text-danger">*</span></label>
                                <select name="position_id" class="form-control" data-placeholder="Select">
                                    {!! $positions !!}
                                </select>
                                {!! $errors->first('position_id', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Hệ <span class="text-danger">*</span></label>
                                <select name="branch" class="form-control" data-placeholder="Select">
                                    {!! $branchs !!}
                                </select>
                                {!! $errors->first('branch', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Chuyên ngành <span class="text-danger">*</span></label>
                                <input name="major" type="text" class="form-control" value="{{ old('major') }}"
                                    placeholder="Nhập nơi đào tạo">
                                {!! $errors->first('major', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Trường đào tạo <span class="text-danger">*</span></label>
                                <input name="training_place" type="text" class="form-control" value="{{ old('training_place') }}"
                                    placeholder="Nhập nơi đào tạo">
                                {!! $errors->first('training_place', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Xếp loại</label>
                                <select name="rank" class="form-control" data-placeholder="Select">
                                    {!! $ranks !!}
                                </select>
                                {!! $errors->first('rank', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Tiếng Anh</label>
                                <input name="english" type="text" class="form-control" value="{{ old('english') }}">
                                {!! $errors->first('english', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngoại ngữ khác</label>
                                <input name="other_language" type="text" class="form-control" value="{{ old('other_language') }}"
                                    placeholder="Nhập ngoại ngữ khác">
                                {!! $errors->first('other_language', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">phần mềm khác</label>
                                <input name="other_software" type="text" class="form-control" value="{{ old('other_software') }}"
                                    placeholder="Nhập Phần mềm khác">
                                {!! $errors->first('other_software', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Thông tin tham chiếu 1</label>
                                <input name="info1" type="text" class="form-control" value="{{ old('info1') }}"
                                    placeholder="Nhập thông tin tham chiếu 1">
                                {!! $errors->first('info1', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Thông tin tham chiếu 2</label>
                                <input name="info2" type="text" class="form-control" value="{{ old('info2') }}"
                                    placeholder="Nhập thông tin tham chiếu 2">
                                {!! $errors->first('info2', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày SLHS</label>
                                <input name="interview_date" type="date" class="form-control" value="{{ old('interview_date') }}"
                                    placeholder="Nhập thông tin tham chiếu 2">
                                {!! $errors->first('interview_date', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Người SLHS</label>
                                <select name="interviewer" class="form-control" data-placeholder="Select">
                                    {!! $users !!}
                                </select>
                                {!! $errors->first('interviewer', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhận xét SLHS</label>
                                <input name="interview_comment" type="text" class="form-control" value="{{ old('interview_comment') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_comment', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Kết quả SLHS</label>
                                <select name="interview_result" class="form-control" data-placeholder="Select">
                                    {!! $interviewResults !!}
                                </select>
                                {!! $errors->first('interview_result', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày PVSB</label>
                                <input name="interview_date0" type="date" class="form-control" value="{{ old('interview_date0') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_date0', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Người PVSB</label>
                                <select name="interviewer0" class="form-control" data-placeholder="Select">
                                    {!! $users !!}
                                </select>
                                {!! $errors->first('interviewer0', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhận xét PVSB</label>
                                <input name="interview_comment0" type="text" class="form-control" value="{{ old('interview_comment0') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_comment0', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Kết quả PVSB</label>
                                <select name="interview_result0" class="form-control" data-placeholder="Select">
                                    {!! $interviewResults !!}
                                </select>
                                {!! $errors->first('interview_result0', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày phỏng vấn lần 1</label>
                                <input name="interview_date1" type="date" class="form-control" value="{{ old('interview_date1') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_date1', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Người phỏng vấn lần 1</label>
                                <select name="interviewer1" class="form-control" data-placeholder="Select">
                                    {!! $users !!}
                                </select>
                                {!! $errors->first('interviewer1', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhận xét phỏng vấn lần 1</label>
                                <input name="interview_comment1" type="text" class="form-control" value="{{ old('interview_comment1') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_comment1', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Kết quả phỏng vấn lần 1</label>
                                <select name="interview_result1" class="form-control" data-placeholder="Select">
                                    {!! $interviewResults !!}
                                </select>
                                {!! $errors->first('interview_result1', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày phỏng vấn lần 2</label>
                                <input name="interview_date2" type="date" class="form-control" value="{{ old('interview_date2') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_date2', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Người phỏng vấn lần 2</label>
                                <select name="interviewer2" class="form-control" data-placeholder="Select">
                                    {!! $users !!}
                                </select>
                                {!! $errors->first('interviewer2', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhận xét phỏng vấn lần 2</label>
                                <input name="interview_comment2" type="text" class="form-control" value="{{ old('interview_comment2') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_comment2', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Kết quả phỏng vấn lần 2</label>
                                <select name="interview_result2" class="form-control" data-placeholder="Select">
                                    {!! $interviewResults !!}
                                </select>
                                {!! $errors->first('interview_result2', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Ngày phỏng vấn lần 3</label>
                                <input name="interview_date3" type="date" class="form-control" value="{{ old('interview_date3') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_date3', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Người phỏng vấn lần 3</label>
                                <select name="interviewer3" class="form-control" data-placeholder="Select">
                                    {!! $users !!}
                                </select>
                                {!! $errors->first('interviewer3', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Nhận xét phỏng vấn lần 3</label>
                                <input name="interview_comment3" type="text" class="form-control" value="{{ old('interview_comment3') }}"
                                    placeholder="Nhập">
                                {!! $errors->first('interview_comment3', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Kết quả phỏng vấn lần 3</label>
                                <select name="interview_result3" class="form-control" data-placeholder="Select">
                                    {!! $interviewResults !!}
                                </select>
                                {!! $errors->first('interview_result3', '<span class="text-danger">:message</span>') !!}
                            </div>
                            <div class="col-3 mb-3">
                                <label class="form-label">Điểm thi tuyển</label>
                                <input name="score" type="text" class="form-control" value="{{ old('score') }}"
                                    placeholder="Nhập">
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
