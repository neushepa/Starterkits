@extends('layouts.admin.app')
@section ('content')
@php
$url = Route::current()->getName();
@endphp
<div class="main-content" style="min-height: 524px;">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{  route('todo.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Back</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Todo</a></div>
              <div class="breadcrumb-item">Create New Todo</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Create New Todo</h2>
            <p class="section-lead">
              On this page you can create a new Todo and fill in all fields.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Todo</h4>
                  </div>
                  <form action="{{ $route }}" method="POST">
                      @csrf
                      @method($method)
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Todo Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="todo" class="form-control" value="{{ str_contains($url, 'edit') ? $td->todo : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote" name="description">{{ old('body', $td->description??'') }}</textarea>
                        </div>
                      </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Assigned to</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="assigned_to" id="assigned_to" class="form-control" required autofocus>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user', $td->assigned_to??'')==$user->id?'selected':'' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input placeholder="Select date" type="date" id="start" class="form-control" name="start" value="{{ str_contains($url, 'edit') ? $td->start_date : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                      <div class="col-sm-12 col-md-7">
                        <input placeholder="Select date" type="date" id="end" class="form-control" name="end" value="{{ str_contains($url, 'edit') ? $td->start_date : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select name="status" id="status" class="form-control" required autofocus>
                                <option value="">Status</option>
                                @foreach($tdstatuses as $st)
                                <option value="{{ $st->id }}" {{ old('status_', $td->status??'')==$st->id?'selected':'' }}>{{ $st->status_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create Todo</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            </form>
          </div>
        </section>
      </div>
@endsection
