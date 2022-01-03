@extends('layouts.admin.app')

@section('content')
<div class="main-content" style="min-height: 524px;">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Article</h4>
                  </div>
                  <div class="card-body">
                    {{ $article }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon bg-primary">
                    <i class="far fa-comment"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Comments</h4>
                    </div>
                    <div class="card-body">
                      {{ $comments }}
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Category</h4>
                  </div>
                  <div class="card-body">
                    {{ $category }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Users</h4>
                  </div>
                  <div class="card-body">
                  {{ $users }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="card">
            <div class="card-header">
              <h4 class="d-inline">Task</h4>
              <div class="card-header-action">
                <a href="#" class="btn btn-primary">View All</a>
              </div>
            </div>
            @foreach ($todos as $td)
            <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                  <li class="media">
                    {{-- <img class="mr-3 rounded-circle" width="50" src="../{{ $td->member->photo }}" alt="avatar"> --}}
                    <img class="mr-3 rounded-circle" width="50" src="../{{ (is_null($td->member->photo)) ? 'assets/admin/img/avatar/avatar-1.png' : ($td->member->photo) }}" alt="avatar">

                    <div class="media-body">
                      <div class="float-right"><a href="{{ route('todo.status', ['id' => $td->id]) }}">{!! $td->status_text !!}</div>
                      <h6 class="media-title"><a href="#">{{ $td->todo }}</a></h6>
                      <div class="text-small text-muted"><a href="{{ route('profile.show',$td->member->id) }}">{{ $td->member->name }}</a></div>
                    </div>
                  </li>
                </ul>
              </div>
            @endforeach
          </div>
      </div>
      <!-- Main Content -->
@endsection
