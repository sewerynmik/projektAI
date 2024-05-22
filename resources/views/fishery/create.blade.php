@include('shared.html')

@include('shared.head', ['pageTitle' => 'Łowiska'])

@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Podaj dane łowiska</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('fishery.store') }}" class="needs-validation" novalidate>
            @csrf
            @method('POST')
            <div class="form-group mb-2">
                <label for="name" class="form-label">Nazwa</label>
                <input id="name" name="name" type="text"
                       class="form-control @if ($errors->first('name')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
            </div>
            <div class="form-group mb-2">
                <label for="voivodeship" class="form-label">Województwo</label>
                <input id="voivodeship" name="voivodeship" type="text"
                       class="form-control @if ($errors->first('voivodeship')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe województwo!</div>
            </div>
            <div class="form-group mb-2">
                <label for="parish" class="form-label">Gmina</label>
                <input id="parish" name="parish" type="text"
                       class="form-control @if ($errors->first('parish')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowa gmina!</div>
            </div>
            <div class="form-group mb-2">
                <label for="locality" class="form-label">Miejscowość</label>
                <input id="locality" name="locality" type="text"
                       class="form-control @if ($errors->first('locality')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowa miejscowość!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

@include('shared.footer')
