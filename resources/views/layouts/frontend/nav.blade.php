<nav id="navbar" class="navbar">
    <ul>
      <li><a class="active " href="/">Home</a></li>
      <li><a href="{{ route('blog.index') }}">Article </a></li>
      <li><a href="{{ route('gallery.show') }}"">Gallery</a></li>
      <li><a href="/about">About</a></li>
      <li class="nav-item">
        @auth
        <li class="nav-item {{ request()->is('gallery')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @else
        <a href="{{ route('login') }}" class="nav-link">Login</a>
        @endauth
    </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
