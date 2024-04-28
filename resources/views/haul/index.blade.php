@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
    @include('shared.navbar')

    <div id="cennik" class="container mt-5 mb-5">
        <div class="row">
            <h1>Połowy</h1>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rybak</th>
                        <th scope="col">Ryba</th>
                        <th scope="col">Łowisko</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($hauls as $haul)
                        <tr>
                            <th scope="row">{{ $haul->id }}</th>
                            <td>{{ $haul->fisherman->name }}</td>
                            <td>{{ $haul->fish->name }}</td>
                            <td>{{ $haul->fishery->name }}</td>
                            <td>{{ $haul->data }}</td>
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
