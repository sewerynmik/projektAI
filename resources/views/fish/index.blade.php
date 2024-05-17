@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')

<div id="ryby" class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Ryby</h1>
        </div>
        @can('is-admin')
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('fish.create') }}" class="btn btn-dark">Dodaj</a>
            </div>
        @endcan
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

@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            alert('{{ session('error') }}');
        });
    </script>
@endif
</body>
