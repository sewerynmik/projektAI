@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
    @include('shared.navbar')

    <div id="cennik" class="container mt-5 mb-5">
        <div class="row">
            <h1>Rybacy</h1>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Imie</th>
                        <th scope="col">Nazwisko</th>
                        <th scope="col">Wiek</th>
                        <th scope="col">Email</th>
                        <th scope="col">Adres</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fishermans as $fisherman)
                        <tr>
                            <th scope="row">{{ $fisherman->id }}</th>
                            <td>{{ $fisherman->name }}</td>
                            <td>{{ $fisherman->surname }}</td>
                            <td>{{ $fisherman->age }}</td>
                            <td>{{ $fisherman->email }}</td>
                            <td>{{ $fisherman->address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <th scope="row" colspan="6">Brak rybaków.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
