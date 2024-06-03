@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

@include('shared.navbar')

<div id="ryby" class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Ryby</h1>
        </div>
        @can('is-admin')
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <form method="POST" action="{{ route('upload.image') }}" enctype="multipart/form-data" id="imageForm">
                    @csrf
                    <input type="file" name="image" class="d-none" id="imageInput" aria-describedby="imageButton">
                    <button type="button" class="btn btn-dark" id="imageButton">Dodaj zdjęcie</button>
                </form>
                <a href="{{ route('fish.create') }}" class="btn btn-dark mx-2">Dodaj</a>
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
            <form method="GET" action="{{ route('fish.search') }}" class="mb-3">
                <div class="mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Szukaj">
                </div>
                <div class="mb-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="name" value="name">
                        <label class="form-check-label" for="name">Nazwa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="species" value="species">
                        <label class="form-check-label" for="species">Gatunek</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="description"
                               value="description">
                        <label class="form-check-label" for="description">Opis</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="search_by" id="image" value="image">
                        <label class="form-check-label" for="image">Zdjęcie</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Szukaj</button>
            </form>
        </div>
    </div>

    <div class="table-responsive-sm">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa ryby</th>
                <th scope="col">Gatunek</th>
                <th scope="col">Opis</th>
                <th scope="col">Zdjęcie</th>
                <th scope="col"></th>
                @can('is-admin')
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @forelse ($fishes as $fish)
                <tr>
                    <th scope="row">{{ $fish->id }}</th>
                    <td>{{ $fish->name }}</td>
                    <td>{{ $fish->species }}</td>
                    <td>{{ $fish->description }}</td>
                    <td>{{ $fish->image }}</td>
                    <td><a href="{{ route('fish.show', $fish->id) }}" class="btn btn-dark">Zobacz</a></td>
                    @can('is-admin')
                        <td><a href="{{route('fish.edit', $fish->id)}}" class="btn btn-primary">Edycja</a></td>
                        <td>
                            {{--                            <a href="{{route('fish.destroy', $fish->id)}}" class="btn btn-danger">Usuń</a>--}}
                            <form method="POST" action="{{ route('fish.destroy', $fish->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Usuń">
                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="6">Brak ryb.</th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        <nav aria-label="Paginacja">
            <ul class="pagination">
                @if ($fishes->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link"
                                             href="{{ $fishes->previousPageUrl() }}">&laquo;</a></li>
                @endif

                @foreach ($fishes->getUrlRange(1, $fishes->lastPage()) as $page => $url)
                    <li class="page-item {{ $fishes->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($fishes->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $fishes->nextPageUrl() }}">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>

<script>
    document.getElementById('imageButton').addEventListener('click', function () {
        document.getElementById('imageInput').click();
    });

    document.getElementById('imageInput').addEventListener('change', function () {
        document.getElementById('imageForm').submit();
    });
</script>

@include('shared.footer')
