@extends('layouts.admin.app')
@section ('content')
{{-- @php
$url = Route::current()->getName();
@endphp --}}

<div class="main-content" style="min-height: 554px;">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="\dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, This is {{ $pro->name }} Profile</h2>
            <p class="section-lead">
                Information about {{ $pro->name }} on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ (is_null($pro->photo)) ? '/assets/admin/img/avatar/avatar-1.png' : asset($pro->photo) }}" class="rounded-circle profile-widget-picture">
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $pro->role }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>{{ $pro->name }}
                                </div>{!! $pro->bio !!}
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="font-weight-bold mb-2">Follow {{ $pro->name }} On</div>
                            <a href="{{ $pro->facebook }}" class="btn btn-social-icon btn-facebook mr-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-social-icon btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="">
                            @csrf
                            {{-- @method($method) --}}
                            <div class="card-header">
                                <h4>Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Identity Number</label>
                                        <input type="text" class="form-control" value="{{ $pro->id_number }}" name="id_number" readonly oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                        <div class="invalid-feedback">
                                            Please fill in the ID Number
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" value="{{ $pro->name }}" required="" name="name" readonly>
                                        <div class="invalid-feedback">
                                            Please fill in the name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" value="{{ $pro->email }}" required="" name="email" readonly>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-phone"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control phone-number" name="phone"  readonly value="{{ $pro->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Gender</label>
                                        <select name="gender" id="gender" class="form-control" readonly>
                                            <option value="{{ $pro->gender }}">{{ $pro->gender }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Religion</label>
                                        <select name="religion"  readonly id="religion" class="form-control">
                                            <option value="{{ $pro->religion }}">{{ $pro->religion }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Birth Date</label>
                                        <input placeholder="Select date" type="date" id="dob" class="form-control" name="dob" value="{{ $pro->dob }}"  readonly>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Blod Type</label>
                                        <select name="blod_type" class="form-control" readonly>
                                            <option value="{{ $pro->blod_type }}">{{ $pro->blod_type }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-location-arrow"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="address"  readonly value="{{ $pro->address }}">
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the Address
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Url Instagram</label>
                                        <input type="text" name="instagram"  readonly class="form-control" value="{{ $pro->instagram }}">
                                        <div class="invalid-feedback">
                                            Please fill in the Instagram Address
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Url Facebook</label>
                                        <input type="text" name="facebook"  readonly class="form-control" value="{{ $pro->facebook }}">
                                        <div class="invalid-feedback">
                                            Please fill in the Facebook Address
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Url Twitter</label>
                                        <input type="text" name="twitter" readonly class="form-control" value="{{ $pro->twitter }}">
                                        <div class="invalid-feedback">
                                            Please fill in the Twitter Address
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer text-right">
                            <a href="{{ url()->previous() }}"><button class="btn btn-primary">Back</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
