@extends('layouts.frontend.app')

@section('content')
<div class="col-lg-8 entries">
    @foreach ($posts as $post)
    <article class="entry">
      <div class="entry-img">
        <img src="images/banners/{{ $post->banner }}" alt="" class="img-fluid">
      </div>
      <h2 class="entry-title">
        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
      </h2>
      <div class="entry-meta">
        <ul>
          <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="/user/{{ $post->user_id }}">{{ $post->user->name }}</a></li>
          <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $post->created_at->diffForHumans() }}</time></a></li>
          <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{ $post->comments->count() }} Comments</a></li>
        </ul>
      </div>

      <div class="entry-content">
        <p>{!! $post->excerpt !!}</p>
        <div class="read-more">
            <a href="/blog/{{ $post->slug }}">Read More</a>
        </div>
      </div>

    </article>
    @endforeach
    <!-- End blog entry -->
    {{ $posts->links() }}
</div>


@endsection
