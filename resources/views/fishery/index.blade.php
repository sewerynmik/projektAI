@include('shared.html')

@include('shared.head', ['pageTitle' => 'Łowiska'])

@include('shared.navbar')

<div id="cennik" class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Łowiska</h1>
        </div>
        @can('is-admin')
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('fishery.create') }}" class="btn btn-dark">Dodaj</a>
            </div>
        @endcan
    </div>

    <p class="d-inline-flex gap-1">
        <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
           aria-controls="collapseExample">
            Filtry
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <div
            class="dropdown-menu d-block position-static border-0 pt-0 mx-0 rounded-3 shadow overflow-hidden w-280px mb-2"
            data-bs-theme="ligth">
            <form class="p-2 mb-2 bg-light border-bottom border-dark">
                <input type="search" class="form-control bg-light" autocomplete="false"
                       placeholder="Wpisz szukaną fraze">
            </form>
            <ul class="list-unstyled mb-0">
                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                        <span class="d-inline-block bg-success rounded-circle p-1"></span>
                        Nazwa
                    </a></li>
                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                        <span class="d-inline-block bg-primary rounded-circle p-1"></span>
                        Województwo
                    </a></li>
                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                        <span class="d-inline-block bg-danger rounded-circle p-1"></span>
                        Gmina
                    </a></li>
                <li><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="#">
                        <span class="d-inline-block bg-info rounded-circle p-1"></span>
                        Miejscowość
                    </a></li>
            </ul>
        </div>
    </div>

    <div class="table-responsive-sm">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Województwo</th>
                <th scope="col">Gmina</th>
                <th scope="col">Miejscowość</th>
                @can('is-admin')
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @forelse ($fisheries as $fishery)
                <tr>
                    <th scope="row">{{ $fishery->id }}</th>
                    <td>{{ $fishery->name }}</td>
                    <td>{{ $fishery->voivodeship }}</td>
                    <td>{{ $fishery->parish }}</td>
                    <td>{{ $fishery->locality }}</td>
                    @can('is-admin')
                        <td><a href="{{ route('fishery.edit', $fishery->id) }}" class="btn btn-primary">Edytuj</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('fishery.destroy', $fishery->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Usuń">
                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="6">Brak łowisk.</th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('shared.footer')
