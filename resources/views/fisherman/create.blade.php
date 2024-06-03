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
                <label for="fisherman_name" class="form-label">Imie</label>
                <input id="fisherman_name" name="fisherman_name" type="text"
                       class="form-control @if ($errors->has('fisherman_name')) is-invalid @endif"
                       value="{{ old('fisherman_name') }}">
                @if ($errors->has('fisherman_name'))
                    <div class="invalid-feedback">{{ $errors->first('fisherman_name') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="surname" class="form-label">Nazwisko</label>
                <input id="surname" name="surname" type="text"
                       class="form-control @if ($errors->has('surname')) is-invalid @endif"
                       value="{{ old('surname') }}">
                @if ($errors->has('surname'))
                    <div class="invalid-feedback">{{ $errors->first('surname') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="age" class="form-label">Wiek</label>
                <input id="age" name="age" type="text"
                       class="form-control @if ($errors->has('age')) is-invalid @endif"
                       value="{{ old('age') }}">
                @if ($errors->has('age'))
                    <div class="invalid-feedback">{{ $errors->first('age') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="phone_number" class="form-label">Numer telefonu</label>
                <input id="phone_number" name="phone_number" type="text"
                       class="form-control @if ($errors->has('phone_number')) is-invalid @endif"
                       value="{{ old('phone_number') }}">
                @if ($errors->has('phone_number'))
                    <div class="invalid-feedback">{{ $errors->first('phone_number') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="pesel" class="form-label">Pesel</label>
                <input id="pesel" name="pesel" type="text"
                       class="form-control @if ($errors->has('pesel')) is-invalid @endif"
                       value="{{ old('pesel') }}">
                @if ($errors->has('pesel'))
                    <div class="invalid-feedback">{{ $errors->first('pesel') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="address" class="form-label">Adres</label>
                <input id="address" name="address" type="text"
                       class="form-control @if ($errors->has('address')) is-invalid @endif"
                       value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="user_name" class="form-label">Nazwa konta</label>
                <input id="user_name" name="user_name" type="text"
                       class="form-control @if ($errors->has('user_name')) is-invalid @endif"
                       value="{{ old('user_name') }}">
                @if ($errors->has('user_name'))
                    <div class="invalid-feedback">{{ $errors->first('user_name') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text"
                       class="form-control @if ($errors->has('email')) is-invalid @endif"
                       value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group mb-2">
                <label for="password" class="form-label">Hasło</label>
                <input id="password" name="password" type="password"
                       class="form-control @if ($errors->has('password')) is-invalid @endif">
                @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

@include('shared.footer')
