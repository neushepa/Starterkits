<h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                @foreach ($categories as $category)
                <li>
                    <a href="/cat/{{ $category->id }}">{{ $category->category_name }} <span>({{ $category->post->where('post_type','=','Blog')->where('category_name', '!=', 'Service')->where('is_publish', '=', '1')->count() }})</span></a>
                </li>
                @endforeach
                </ul>
              </div>
