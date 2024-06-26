<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Rybka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
                aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('fish') ? 'active' : '' }}" href="{{ url('fish') }}">Ryby</a>
                </li>
                @can('is-admin')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('fisherman') ? 'active' : '' }}"
                           href="{{ url('fisherman') }}">Rybacy</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('fishery') ? 'active' : '' }}"
                       href="{{ url('fishery') }}">Łowiska</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('haul') ? 'active' : '' }}"
                           href="{{ url('haul') }}">Połowy</a>
                    </li>
                @endif

            </ul>
            @if(Auth::check())

                <div class="btn-group ms-auto {{ Request::is('haul') ? 'justify-content-start' : 'justify-content-end' }}">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        Witaj {{ auth()->user()->fisherman->name }}
                    </button>
                    <ul class="dropdown-menu  dropdown-menu-sm-end">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Wyloguj</a></li>
                    </ul>
                </div>

            @else
                <div class="ms-auto">
                    <a class="btn btn-success me-2" href="{{ Route('register') }}">Zarejestruj</a>
                    <a class="btn btn-success " href="{{ Route('login') }}">Zaloguj</a>
                </div>
            @endif
        </div>
    </div>
</nav>


@if(session('success'))
    <div id="successMessage" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div id="errorMessage" class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
