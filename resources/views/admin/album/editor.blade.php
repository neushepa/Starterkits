@extends('layouts.admin.app')
@section ('content')
@php
$url = Route::current()->getName();
@endphp
<div class="main-content" style="min-height: 524px;">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ url()->previous() }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Back</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Album</a></div>
              <div class="breadcrumb-item">Create New Album</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Create New Album</h2>
            <p class="section-lead">
              On this page you can create a new album and fill in all fields.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Write Your Album</h4>
                  </div>
                  <form action="{{ $route }}" method="POST">
                      @csrf
                      @method($method)
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Name</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="album_name" class="form-control" value="{{ str_contains($url, 'edit') ? $albums->album_name : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Album Description</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="album_description" class="form-control" value="{{ str_contains($url, 'edit') ? $albums->album_description : '' }}">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create Album</button>
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
