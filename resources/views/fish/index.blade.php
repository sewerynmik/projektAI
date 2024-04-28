@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
    @include('shared.navbar')

    <div id="cennik" class="container mt-5 mb-5">
        <div class="row">
            <h1>Ryby</h1>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nazwa ryby</th>
                        <th scope="col">Gatunek</th>
                        <th scope="col">Opis</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fishes as $fish)
                        <tr>
                            <th scope="row">{{ $fish->id }}</th>
                            <td>{{ $fish->name }}</td>
                            <td>{{ $fish->species }}</td>
                            <td>{{ $fish->description }}</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="6">Brak ryb.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
