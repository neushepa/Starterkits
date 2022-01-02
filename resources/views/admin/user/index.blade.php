@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>User Management</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></div>
              <div class="breadcrumb-item">All Users</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">List User</h2>
            <p class="section-lead">
              You can manage all User, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All User</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Updated</th>
                                {{-- <th>Role</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        @foreach ($peoples as $people)
                        <?php $i++ ;?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td><a href="{{ route('profile.show',$people->id) }}">{{ $people->name }}</a></td>
                                <td>{{ $people->email }}</td>
                                <td>{{ $people->created_at }}</td>
                                <td>{{ $people->updated_at }}</td>
                                {{-- <td>{{ $people->role }}</td> --}}
                                <td>
                                    <form method="POST" action="{{ route('user.destroy',$people->id) }}">
                                        <a class="btn btn btn-primary btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('user.edit',$people->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn btn-success btn-flat" data-toggle="tooltip" title='Role' href="{{ route('user.changerole',$people->id) }}"><i class="fas fa-user"></i></a>
                                        <a class="btn btn btn-warning btn-flat" data-toggle="tooltip" title='Reset Password' href="{{ route('user.resetpass', ['id' => $people->id]) }}"><i class="fas fa-key"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection

@section('script')
<script>
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal(
        {
             text: "Are you sure you want to delete this Users?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }
         });
     });
</script>
@endsection
