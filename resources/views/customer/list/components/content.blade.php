<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-sm-between">
            <h3>Customer List</h3>
        </div>
        <div class="data-content mt-3">
            <div class="col-sm mb-3">
                <form action="{{ route('customer.list') }}" method="GET">
                    <div class="d-flex justify-content-sm-start">
                        <div class="form-group me-2 col-md-2">
                            <input type="text" name="name" class="form-control" autocomplete="off"
                                placeholder="Name" value="{{ request('name') }}">
                        </div>
                        <div class="form-group me-2 col-md-2">
                            <input type="text" name="company_name" class="form-control" autocomplete="off"
                                placeholder="Company Name" value="{{ request('company_name') }}">
                        </div>
                        <div class="form-group me-2 col-md-2">
                            <input type="text" name="phone" class="form-control" autocomplete="off"
                                placeholder="Phone" value="{{ request('phone') }}">
                        </div>
                        <div class="form-group me-2 col-md-2">
                            <input type="text" name="email" class="form-control" autocomplete="off"
                                placeholder="Email" value="{{ request('email') }}">
                        </div>
                        <div class="form-group me-2">
                            <button class="btn btn-primary me-1">
                                <i class="bi bi-search"></i>
                                Search
                            </button>
                            <a href="{{ route('customer.list') }}" class="btn btn-light">
                                <i class="bi bi-arrow-repeat"></i>
                                Refresh
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <form action="{{ route('customer.list') }}" method="GET"
                class="d-flex align-items-start justify-content-start mb-2">
                <p class="row-per-page mb-0 align-self-center me-1">Số hàng mỗi trang</p>
                <select name="rowPerPage" class="form-select row-per-page-select" onchange="this.form.submit()">
                    <option value="25" {{ request('rowPerPage') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('rowPerPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="75" {{ request('rowPerPage') == 75 ? 'selected' : '' }}>75</option>
                    <option value="100" {{ request('rowPerPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
            <table class="table table-nowrap table-striped mt-2">
                <thead>
                    <tr>
                        {{-- @if (count($data['actions']) > 0)
                            <th scope="col" class="text-center" width="5%">Action</th>
                        @endif --}}
                        <th scope="col">Name</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Company type</th>
                        <th scope="col">Position</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country</th>
                        <th scope="col">Product interested in</th>
                        <th scope="col">Other concern</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $record)
                        <tr>
                            {{-- @if (count($data['actions']) > 0)
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.catalog.attributes.edit', $record->id) }}">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item js-delete-attribute text-danger"
                                                href="javascript:void(0)" data-token="{{ csrf_token() }}"
                                                data-method="POST"
                                                data-action="{{ route('admin.catalog.attributes.delete', ['id' => $record->id]) }}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            @endif --}}
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->company_name }}</td>
                            <td>{{ $record->company_type }}</td>
                            <td>{{ $record->position }}</td>
                            <td>{{ $record->phone }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->country }}</td>
                            <td>{{ $record->product_interested_in }}</td>
                            <td>{{ $record->other_concern }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 d-flex justify-content-between align-items-start">
                <div class="num-record me-2 d-flex align-items-center">
                    <p class="mb-0 me-1">Hiển thị</p> {{ $data->from }} <p class="mb-0 mx-1">đến</p>
                    {{ $data->to }}
                    <p class="mb-0 mx-1">trên</p> {{ $data->total() }}<p class="mb-0 ms-1">bản ghi</p>
                </div>
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
