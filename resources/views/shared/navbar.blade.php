<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Rybka</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('fish') ? 'active' : '' }}" href="{{ url('fish') }}">Ryby</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('fisherman') ? 'active' : '' }}" href="{{ url('fisherman') }}">Rybacy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('fishery') ? 'active' : '' }}" href="{{ url('fishery') }}">Łowiska</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link {{ Request::is('haul') ? 'active' : '' }}" href="{{ url('haul') }}">Połowy</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
