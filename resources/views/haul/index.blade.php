@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')

<div id="cennik" class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Połowy</h1>
        </div>
        @can('is-admin')
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('haul.create') }}" class="btn btn-dark">Dodaj</a>
            </div>
        @else
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('haul.add') }}" class="btn btn-dark">Dodaj</a>
            </div>
        @endcan
    </div>
    <div class="table-responsive-sm">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                @can('is-admin')
                    <th scope="col">Rybak</th>
                @endcan
                <th scope="col">Ryba</th>
                <th scope="col">Łowisko</th>
                <th scope="col">Data</th>
                @can('is-admin')
                    <td scope="col"></td>
                    <td scope="col"></td>
                @endcan
            </tr>
            </thead>
            <tbody>
            @forelse ($hauls as $haul)
                <tr>
                    <th scope="row">{{ $haul->id }}</th>
                    @can('is-admin')
                        <td>{{ $haul->fisherman->name }}</td>
                    @endcan
                    <td>{{ $haul->fish->name }}</td>
                    <td>{{ $haul->fishery->name }}</td>
                    <td>{{ $haul->data }}</td>
                    @can('update', $haul)
                        <td><a href="{{ route('haul.edit', $haul->id) }}" class="btn btn-primary">Edytuj</a></td>
                    @endcan
                    @can('delete', $haul)
                        <td>
                            <form method="POST" action="{{ route('haul.destroy', $haul->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Usuń">
                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="6">Brak połowów.</th>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
