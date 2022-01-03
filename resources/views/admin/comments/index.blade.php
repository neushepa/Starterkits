@extends('layouts.admin.app')
@section('content')
<div class="main-content" style="min-height: 555px;">
    <section class="section">
      <div class="section-header">
        <h1>Comments</h1>
        <div class="section-header-button">
          {{-- <a href="" class="btn btn-primary">Add New</a> --}}
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route("admin.dashboard") }}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{ route("comments.index") }}">Comments</a></div>
          <div class="breadcrumb-item">All Comments</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Comments</h2>
        <p class="section-lead">
          You can manage all Comments, such as editing, deleting and more.
        </p>


        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Comments</h4>
              </div>

              <div class="card-body">
                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Author</th>
                            <th>E-Mail</th>
                            {{-- <th>Comment</th> --}}
                            <th>Reponse To</th>
                            <th>Submitted on</th>
                            <td>Status</td>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($comments as $comment)
                        @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            @if ( empty( $comment->commenter_id ))
                                <td>{{ $comment->guest_name }}</td>
                            @else
                                <td><a href="{{ route('profile.show',$comment->commenter_id) }}" target="_blank">{{ $comment->author->name }}</a></td>
                            @endif
                            <td><a href="mailto:{{ $comment->guest_email }}">{{ $comment->guest_email }}</td>
                            {{-- <td>{{ $comment->comment }}</td> --}}
                            <td><a href="/blog/{{ $comment->title_post->slug }}" target="_blank" title="{{ $comment->comment }}">{{ $comment->title_post->title }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td><a href="{{ route('comment.status', ['id' => $comment->id]) }}">{!! $comment->status_text !!}</td>
                            <td><form method="POST" action="{{ route('comments.destroy',$comment->id) }}">
                                    <a class="btn btn-primary btn-flat" data-toggle="tooltip" title='Edit' href="{{ route('comments.edit',$comment->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
        $('#table_id').DataTable({
            "order": [[ 3, "desc" ]],
            "autoWidth": true
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
             text: "Are you sure you want to delete this comment?",
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
