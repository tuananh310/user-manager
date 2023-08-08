@extends('layouts.master_auth')

@section('css')

@stop

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="page-title-box d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/chicnchill-logo.png') }}" alt="Logo ChicnChill" class="w-75" />
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <form method="POST" action="{{ route('customer.store') }}">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title mb-0">CUSTOMER INFORMATION</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label">
                                        Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" class="form-control @error('name') border-danger @enderror"
                                        id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company_name" class="form-label">
                                        Company Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="company_name" class="form-control @error('company_name') border-danger @enderror" id="company_name"
                                        value="{{ old('company_name') }}">
                                    @error('company_name')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company_type" class="form-label">
                                        Company Type
                                    </label>
                                    <select class="form-select mb-3" name="company_type">
                                        <option value="Manufacturer"
                                            {{ old('company_type') == 'Manufacturer' ? 'selected' : '' }}>Manufacturer
                                        </option>
                                        <option value="Whosaler" {{ old('company_type') == 'Whosaler' ? 'selected' : '' }}>
                                            Whosaler</option>
                                        <option value="Distributor"
                                            {{ old('company_type') == 'Distributor' ? 'selected' : '' }}>Distributor
                                        </option>
                                        <option value="Retailer" {{ old('company_type') == 'Retailer' ? 'selected' : '' }}>
                                            Retailer</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <div>
                                        <label for="position" class="form-label">
                                            Position
                                        </label>
                                        <input type="text" name="position" class="form-control" id="position"
                                            value="{{ old('position') }}">
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone" class="form-label">
                                        Phone Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="phone" class="form-control @error('phone') border-danger @enderror" id="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" name="email" class="form-control @error('email') border-danger @enderror" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country" class="form-label">
                                        Country
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="country" class="form-control @error('country') border-danger @enderror" id="country" value="{{ old('country') }}">
                                    @error('country')
                                        <p class="text-danger mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="product_interested_in" class="form-label">
                                        Product Interested In
                                    </label>
                                    <input type="text" name="product_interested_in" class="form-control" id="product_interested_in"
                                        value="{{ old('product_interested_in') }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="other_concern" class="form-label">
                                        Other Concern
                                    </label>
                                    <input type="text" name="other_concern" class="form-control" id="other_concern"
                                        value="{{ old('other_concern') }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
@stop
