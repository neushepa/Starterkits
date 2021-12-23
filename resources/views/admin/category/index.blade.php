@extends('layouts.admin.app')
@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Category</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Category</a></div>
              <div class="breadcrumb-item">All Category</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Category</h2>
            <p class="section-lead">
              You can manage all category, such as editing, deleting and more.
            </p>


            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Category</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Date</th>
                                <th>Created By</th>
                                <th>Last Update By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0 @endphp
                            @foreach ($categories as $cat)
                            @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $cat->category_name }}</td>
                                <td>{{ $cat->category_slug }}</td>
                                <td>{{ $cat->created_at }}</td>
                                <td>{{ $cat->user->name }}</td>
                                <td>{{ $cat->last_update->name }}</td>
                                <td><form method="POST" action="{{ route('category.destroy',$cat->id) }}">
                                    <a class="btn btn-primary btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('category.edit',$cat->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
             text: "Are you sure you want to delete this category?",
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
