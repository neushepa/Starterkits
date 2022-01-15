@extends('layouts.admin.app')

@section ('content')
<div class="main-content" style="min-height: 555px;">
        <section class="section">
          <div class="section-header">
            <h1>Todo</h1>
            <div class="section-header-button">
              <a href="{{ $route }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Todos</a></div>
              <div class="breadcrumb-item">All Todos</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Todo</h2>
            <p class="section-lead">
              You can manage all Todo, such as assign user, editing, deleting and more.
            </p>

            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Todos</h4>
                  </div>
                  <div class="card-body">


                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Todo</th>
                                <th>Assigned To</th>
                                {{-- <th>Start Date</th> --}}
                                {{-- <th>End Date</th> --}}
                                <th>Created</th>
                                <th>Last Update</th>
                                {{-- <th>Created By</th> --}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $i=0 @endphp
                        @foreach ($todo as $td)
                        @php $i++ @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $td->todo }}</td>
                                <td>{{ $td->member->name }}</td>
                                {{-- <td>{{ $td->start_date }}</td> --}}
                                {{-- <td>{{ $td->end_date }}</td> --}}
                                <td>{{ $td->created_at }}</td>
                                <td>{{ $td->updated_at }}</td>
                                {{-- <td>{{ $td->user->name }}</td> --}}
                                <td><a href="{{ route('todo.status', ['id' => $td->id]) }}">{!! $td->status_text !!}</a></td>
                                <td align="center">
                                    <form method="POST" name ="del" action="{{ route('todo.destroy',$td->id) }}">
                                        <a class="btn btn-icon btn-info" href="" id="detailtodo" data-toggle="modal" data-target="#myModal" data-id={{  $td->id  }} title='Detail'><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-icon btn-warning" data-toggle="tooltip" title='Edit' href="{{ route('todo.edit',$td->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icon btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button>
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

{{-- Start Detail Todo --}}
      <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <input type="hidden" id="id" name="id" value="">
            <div class="modal-header">
              <h5 class="modal-title">Detail Task Todo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Task</label>
                <input type="text" name="todo" id="todo" value="" class="form-control" disabled>
                <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Description</label>
                <textarea class="form-control" name="description" id="description" value="" class="form-control" disabled></textarea>
                <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Start Date</label>
                <input type="text" name="start_date" id="start_date" value="" class="form-control" disabled>
                <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">End Date</label>
                <input type="text" name="end_date" id="end_date" value="" class="form-control" disabled>
                <label class="col-form-label text-md-left col-12 col-md-12 col-lg-12">Last Update</label>
                <input type="text" name="updated_at" id="updated_at" value="" class="form-control" disabled>
                {{-- <textarea class="summernote" name="description">{{ old('body', $td->description??'') }}</textarea> --}}
            </div>
            <div class="modal-footer bg-whitesmoke br">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
{{-- End Detail Todo --}}



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
             text: "Are you sure you want to delete this Task?",
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
<script>

    $(document).ready(function () {

    $('body').on('click', '#detailtodo', function (event) {

        event.preventDefault();
        var id = $(this).data('id');
        $.get('/admin/todo/show/'+id+'', function (data) {
            //  $('#userCrudModal').html("Edit category");
            //  $('#submit').val("Edit category");
             $('#myModal').modal('show');
             $('#id').val(data.data.id);
             $('#todo').val(data.data.todo);
             $('#description').val(data.data.description);
             $('#start_date').val(data.data.start_date);
             $('#end_date').val(data.data.end_date);
             $('#updated_at').val(data.data.updated_at);
         })
    });

    });
    </script>
@endsection
