@include('shared.html')

@include('shared.head', ['pageTitle' => 'Rybacy'])

@include('shared.navbar')

<div id="cennik" class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Rybacy</h1>
        </div>
        @can('is-admin')
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="{{ route('fisherman.create') }}" class="btn btn-dark">Dodaj</a>
            </div>
        @endcan
    </div>
    <div class="table-responsive-sm">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imie</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Wiek</th>
                <th scope="col">Nr telefonu</th>
                <th scope="col">Pesel</th>
                @can('is-admin')
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @forelse ($fishermans as $fisherman)
                <tr>
                    <th scope="row">{{ $fisherman->id }}</th>
                    <td>{{ $fisherman->name }}</td>
                    <td>{{ $fisherman->surname }}</td>
                    <td>{{ $fisherman->age }}</td>
                    <td>{{ $fisherman->phone_number }}</td>
                    <td>{{ $fisherman->pesel }}</td>
                    @can('is-admin')
                        <td><a href="{{ route('fisherman.edit', $fisherman->id) }}" class="btn btn-primary">Edytuj</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('fisherman.destroy', $fisherman->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Usuń">
                            </form>
                        </td>
                    @endcan
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
@include('shared.footer')
