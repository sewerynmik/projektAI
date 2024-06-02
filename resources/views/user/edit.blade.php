@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj dane konta</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('users.update', $user->fisherman->id) }}" class="needs-validation"
              novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="name" class="form-label">Imie</label>
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       value="{{ $user->fisherman->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="surname" class="form-label">Nazwisko</label>
                <input id="surname" name="surname" type="text"
                       class="form-control @error('surname') is-invalid @enderror"
                       value="{{ $user->fisherman->surname }}">
                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="age" class="form-label">Wiek</label>
                <input id="age" name="age" type="text" class="form-control @error('age') is-invalid @enderror"
                       value="{{ $user->fisherman->age }}">
                @error('age')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="phone_number" class="form-label">Numer telefonu</label>
                <input id="phone_number" name="phone_number" type="text"
                       class="form-control @error('phone_number') is-invalid @enderror"
                       value="{{ $user->fisherman->phone_number }}">
                @error('phone_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label for="pesel" class="form-label">PESEL</label>
                <input id="pesel" name="pesel" type="text" class="form-control @error('pesel') is-invalid @enderror"
                       value="{{ $user->fisherman->pesel }}">
                @error('pesel')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center mt-4 mb-4">
                <button class="btn btn-success" type="submit">Wyślij</button>
            </div>
        </form>
    </div>
</div>

</body>
