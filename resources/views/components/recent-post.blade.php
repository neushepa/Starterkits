<h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                @foreach ($recent_posts as $post)
                <div class="post-item clearfix">
                  <img src="{{ asset('images/banners/'.$post->banner) }}" alt="">
                  <h4><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h4>
                  <time datetime="2020-01-01">{{ $post->created_at->format('M d, Y') }}</time>
                </div>
                @endforeach
              </div>
