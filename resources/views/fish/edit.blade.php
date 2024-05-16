@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj dane ryby</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('fish.update', $fish->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="name" class="form-label">Nazwa ryby</label>
                <input id="name" name="name" type="text"
                       class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ $fish->name }}">
                <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
            </div>
            <div class="form-group mb-2">
                <label for="species" class="form-label">Gatunek</label>
                <input id="species" name="species" type="text"
                       class="form-control @if ($errors->first('species')) is-invalid @endif" value="{{ $fish->species }}">
                <div class="invalid-feedback">Nieprawidłowy gatunek!</div>
            </div>
            <div class="form-group mb-2">
                <label for="description" class="form-label">Opis</label>
                <input id="description" name="description" type="text"
                       class="form-control @if ($errors->first('description')) is-invalid @endif"
                       value="{{ $fish->description }}">
                <div class="invalid-feedback">Nieprawidłowa opis!</div>
            </div>
            <div class="form-group mb-2">
                <label for="image" class="form-label">Zdjęcie</label>
                <input id="image" name="image" type="text"
                       class="form-control @if ($errors->first('image')) is-invalid @endif"
                       value="{{ $fish->image }}">
                <div class="invalid-feedback">Nieprawidłowe zdjęcie!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

</body>
