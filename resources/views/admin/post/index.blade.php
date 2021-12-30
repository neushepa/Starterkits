@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Posts</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route("admin.dashboard") }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route("post.index") }}">Posts</a></div>
              <div class="breadcrumb-item">All Posts</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Posts</h2>
            <p class="section-lead">
              You can manage all posts, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Posts</h4>
                  </div>

                  <div class="card-body">
                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                {{-- <th>Slug</th> --}}
                                <th>Category</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Last Update By</th>
                                <td>Status</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($posts as $ps)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $ps->title }}</td>
                                {{-- <td>{{ $ps->slug }}</td> --}}
                                <td>{{ $ps->category->category_name }}</td>
                                <td>{{ $ps->created_at }}</td>
                                <td>{{ $ps->user->name }}</td>
                                <td>{{ $ps->last_update->name }}</td>
                                <td><a href="{{ route('post.status', ['id' => $ps->id]) }}">{!! $ps->status_text !!}</td>
                                <td><form method="POST" action="{{ route('post.destroy',$ps->id) }}">
                                    <a class="btn btn btn-primary btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('post.edit',$ps->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-action btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>

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
        $('#table_id').DataTable({
            "order": [[ 3, "desc" ]]
        });
    } );
</script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal(
        {
             text: "Are you sure you want to delete this post?",
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
