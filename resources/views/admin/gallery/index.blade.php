@extends('layouts.admin.app')

@section('content')

<div class="main-content" style="min-height: 555px;">
    <section class="section">
        <div class="section-header">
            <h1>Galleries</h1>
            <div class="section-header-button">
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Gallery</a></div>
                <div class="breadcrumb-item">All Gallery</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Gallery</h2>
            <p class="section-lead">
                You can manage all Gallery, such as editing, deleting and more.
            </p>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Gallery</h4>
                        </div>
                        <div class="card-body">
                          <div class="clearfix mb-3"></div>

                          <div class="table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Album</th>
                                            <th>Title</th>
                                            <th>Preview</th>
                                            <th>Description</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=0 @endphp
                                        @foreach ($galleries as $gallery)
                                        @php $i++ @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $gallery->album->album_name }}</td>
                                            <td>{{ $gallery->title }}</td>
                                            <td>
                                                <img src="{{ asset('/assets/gallery/'.$gallery->picture) }}" style="max-height: 150px" alt="" class="img-thumbnail">
                                            </td>
                                            <td>
                                                {!! $gallery->description !!}
                                            </td>
                                            <td>
                                                {{ $gallery->created_at }}
                                            </td>
                                            <td><form method="POST" action="{{ route('gallery.destroy', $gallery) }}">
                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title='Edit' href="{{ route('gallery.edit',$gallery) }}"><i class="fas fa-pencil-alt"></i></a>
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
             text: "Are you sure you want to delete this file from Gallery?",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
               form.submit();
               swal("Deleted!", "Your imaginary file has been deleted.", "success");
           }
               swal("Canceled!", "Your imaginary file saved.", "success");
         });
     });

</script>
@endsection
