<header class="header">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="navbar">
      <div class="container"><a class="navbar-brand" href="{{route('frontend.index')}}"><img src="{{asset('assets/images/logo-2.png')}}" alt="" width="100"></a>
        <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link link-scroll {{Request::is('/') ? 'active' : '' }}" href="{{route('frontend.index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            @auth
            @can('admin')
            <li class="nav-item">
              <a class="nav-link link-scroll" href="{{route('dashboard.index')}}">Admin Dashboard <span class="sr-only">(current)</span></a>
            </li>
            @endcan
            @endauth
            
            <li class="nav-item">
              <a class="nav-link link-scroll {{Request::is('penginapan') ? 'active' : '' }}" href="{{route('frontend.penginapan.index')}}">Penginapan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-scroll {{Request::is('kesehatan') ? 'active' : '' }}" href="{{route('frontend.kesehatan.index')}}">Kesehatan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-scroll {{Request::is('kebudayaan') ? 'active' : '' }}" href="{{route('frontend.kebudayaan.index')}}">Kebudayaan</a>
            </li>

            @guest
            <li class="nav-item">
              <a class="nav-link link-scroll" href="{{route('login')}}">Login</a>
            </li>
            @endguest

            @auth
            <li class="nav-item">
              <a class="nav-link link-scroll" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            @endauth

          </ul>
        </div>
      </div>
    </nav>
  </header>