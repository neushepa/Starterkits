@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Album</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Album</a></div>
              <div class="breadcrumb-item">All Album</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Album</h2>
            <p class="section-lead">
              You can manage all album, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Album</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Album Name</th>
                                <th>Description</th>
                                <th>created at</th>
                                <th>Update at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0 @endphp
                            @foreach ($albums as $album)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $album->album_name }}</td>
                                <td>{{ $album->album_description }}</td>
                                <td>{{ $album->created_at }}</td>
                                <td>{{ $album->updated_at }}</td>
                                <td><form method="POST" action="{{ route('album.destroy',$album->id) }}">
                                    <a class="btn btn-primary btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('album.edit',$album->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
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
             text: "Are you sure you want to delete this Album?",
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
