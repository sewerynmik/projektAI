@include('shared.html')

@include('shared.head', ['pageTitle' => 'Łowiska'])

<body>
@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj dane łowiska</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('fishery.update', $fishery->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="name" class="form-label">Nazwa</label>
                <input id="name" name="name" type="text"
                       class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ $fishery->name }}">
                <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
            </div>
            <div class="form-group mb-2">
                <label for="voivodeship" class="form-label">Województwo</label>
                <input id="voivodeship" name="voivodeship" type="text"
                       class="form-control @if ($errors->first('voivodeship')) is-invalid @endif"
                       value="{{ $fishery->voivodeship }}">
                <div class="invalid-feedback">Nieprawidłowe województwo!</div>
            </div>
            <div class="form-group mb-2">
                <label for="parish" class="form-label">Gmina</label>
                <input id="parish" name="parish" type="text"
                       class="form-control @if ($errors->first('parish')) is-invalid @endif"
                       value="{{ $fishery->parish }}">
                <div class="invalid-feedback">Nieprawidłowa gmina!</div>
            </div>
            <div class="form-group mb-2">
                <label for="locality" class="form-label">Miejscowość</label>
                <input id="locality" name="locality" type="text"
                       class="form-control @if ($errors->first('locality')) is-invalid @endif"
                       value="{{ $fishery->locality }}">
                <div class="invalid-feedback">Nieprawidłowa miejscowość!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

</body>
