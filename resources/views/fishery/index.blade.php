@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
    @include('shared.navbar')

    <div id="cennik" class="container mt-5 mb-5">
        <div class="row">
            <h1>Łowiska</h1>
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
</body>
