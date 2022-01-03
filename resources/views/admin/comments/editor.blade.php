@extends('layouts.admin.app')
@section ('content')
@php
$url = Route::current()->getName();
@endphp
<div class="main-content" style="min-height: 524px;">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{ route('comments.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Back</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Comments</a></div>
              <div class="breadcrumb-item">Edit Comment</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Edit Comment</h2>
            <p class="section-lead">
              On this page you can Edit Comment and fill in all fields.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Comment</h4>
                  </div>
                  <form action="{{ $route }}" method="POST">
                      @csrf
                      @method($method)
                  <div class="card-body">
                      @if ( empty( $comment->commenter_id ))
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cat_name" class="form-control" value="{{ str_contains($url, 'edit') ? $comment->guest_name : '' }}" disabled>
                      </div>
                    </div>
                    @else
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" name="cat_name" class="form-control" value="{{ str_contains($url, 'edit') ? $comment->author->name : '' }}" disabled>
                        </div>
                      </div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="cat_slug" class="form-control" value="{{ str_contains($url, 'edit') ? $comment->guest_email : '' }}" disabled>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comment</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote" name="comment">{{ old('body', $comment->comment??'') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update</button>
                        <button class="btn btn-danger">Delete</button>
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
