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
        <div class="card card-body">
            <form method="GET" action="{{ route('fishery.search') }}" class="mb-3">
                <div class="mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Szukaj">
                </div>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="name" value="name">
                        <label class="form-check-label" for="name">Nazwa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="voivodeship" value="voivodeship">
                        <label class="form-check-label" for="voivodeship">Województwo</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="parish" value="parish">
                        <label class="form-check-label" for="parish">Gmina</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="locality" value="locality">
                        <label class="form-check-label" for="locality">Miejscowość</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Szukaj</button>
            </form>
        </div>
    </div>


    <div class="table-responsive-md">
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
