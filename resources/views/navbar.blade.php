<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <!-- Navbar Link -->
    <ul class="nav navbar-nav">
      {{-- Beranda --}}
      @if (!empty($halaman) && $halaman == 'beranda')
        <li class="active"><a href="{{ url('pt') }}">Beranda <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('pt') }}">Beranda</a></li>
      @endif

       {{-- Draft --}}
      @if (!empty($halaman) && $halaman == 'draft')
        <li class="active"><a href="{{ url('draft') }}">Draft <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('draft') }}">Draft</a></li>
      @endif

      {{-- Laporan --}}
      @if (!empty($halaman) && $halaman == 'laporan')
        <li class="active"><a href="{{ url('laporan') }}">Laporan<span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('laporan') }}">Laporan</a></li>
      @endif

      {{-- Manj. PT --}}
      @if (Auth::check() && Auth::User()->level == 'Admin')
      @if (!empty($halaman) && $halaman == 'manj.pt')
        <li class="active"><a href="{{ url('manjpt') }}">Draft <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('manjpt') }}">Manj. PT</a></li>
      @endif
      @endif
  

      {{-- Manj. User --}}
      @if (Auth::check() && Auth::User()->level == 'Admin')
      @if (!empty($halaman) && $halaman == 'manj.user')
        <li class="active"><a href="{{ url('manjuser') }}">Manj. User <span class="sr-only">(current)</span></a></li>
      @else
        <li><a href="{{ url('manjuser') }}">Manj. User</a></li>
      @endif
      @endif


    </ul> <!-- / Navbar Link -->




    <!-- Link Login / Logout -->
    <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="/login">{{ __('Login') }}</a>
            </li>
        @endif
    </ul><!-- /.logout link -->
  </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>



