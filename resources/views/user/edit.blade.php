@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj dane konta</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('users.updateEmail', $user->fisherman->id) }}" class="needs-validation"
              novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="name" class="form-label">Imie</label>
                <input id="name" name="name" type="text"
                       class="form-control @if ($errors->first('name')) is-invalid @endif"
                       value="{{ $user->fisherman->name }}">
                <div class="invalid-feedback">Nieprawidłowe imie!</div>
            </div>
            <div class="form-group mb-2">
                <label for="surname" class="form-label">Imie</label>
                <input id="surname" name="surname" type="text"
                       class="form-control @if ($errors->first('surname')) is-invalid @endif"
                       value="{{ $user->fisherman->surname }}">
                <div class="invalid-feedback">Nieprawidłowe nazwisko!</div>
            </div>
            <div class="form-group mb-2">
                <label for="age" class="form-label">Wiek</label>
                <input id="age" name="age" type="text"
                       class="form-control @if ($errors->first('age')) is-invalid @endif"
                       value="{{ $user->fisherman->age }}">
                <div class="invalid-feedback">Nieprawidłowy wiek!</div>
            </div>
            <div class="form-group mb-2">
                <label for="phone_number" class="form-label">Numer telefonu</label>
                <input id="phone_number" name="phone_number" type="text"
                       class="form-control @if ($errors->first('phone_number')) is-invalid @endif"
                       value="{{ $user->fisherman->phone_number }}">
                <div class="invalid-feedback">Nieprawidłowy numer telefonu!</div>
            </div>
            <div class="form-group mb-2">
                <label for="pesel" class="form-label">Wiek</label>
                <input id="pesel" name="pesel" type="text"
                       class="form-control @if ($errors->first('pesel')) is-invalid @endif"
                       value="{{ $user->fisherman->pesel }}">
                <div class="invalid-feedback">Nieprawidłowy pesel!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

</body>
