@include('shared.html')

@include('shared.head', ['pageTitle' => 'Rybacy'])

@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Podaj dane łowiska</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('fisherman.store') }}" class="needs-validation" novalidate>
            @csrf
            @method('POST')
            <div class="form-group mb-2">
                <label for="name" class="form-label">Imie</label>
                <input id="name" name="name" type="text"
                       class="form-control @if ($errors->first('name')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe imie!</div>
            </div>
            <div class="form-group mb-2">
                <label for="surname" class="form-label">Nazwisko</label>
                <input id="surname" name="surname" type="text"
                       class="form-control @if ($errors->first('surnme')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe nawisko!</div>
            </div>
            <div class="form-group mb-2">
                <label for="age" class="form-label">Wiek</label>
                <input id="age" name="age" type="text"
                       class="form-control @if ($errors->first('age')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowy wiek!</div>
            </div>
            <div class="form-group mb-2">
                <label for="phone_number" class="form-label">Numer telefonu</label>
                <input id="phone_number" name="phone_number" type="text"
                       class="form-control @if ($errors->first('phone_number')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowy numer!</div>
            </div>
            <div class="form-group mb-2">
                <label for="address" class="form-label">Adres</label>
                <input id="address" name="address" type="text"
                       class="form-control @if ($errors->first('address')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowy adres!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

@include('shared.footer')
