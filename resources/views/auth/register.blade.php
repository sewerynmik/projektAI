@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

@include('shared.navbar')

<div class="d-flex justify-content-center mt-5">
    <div class="col-10 col-sm-10 col-md-6 col-lg-4">
        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
            @csrf
            @method('POST')
            <h1 class="d-flex justify-content-center">Rejestracja</h1>
            <div class="form-group mb-2">
                <label for="fisherman_name" class="form-label">Imię</label>
                <input id="fisherman_name" name="fisherman_name" type="text"
                       class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ old('name') }}">
                <div class="invalid-feedback">Nieprawidłowe imię!</div>
            </div>
            <div class="form-group mb-2">
                <label for="surname" class="form-label">Nazwisko</label>
                <input id="surname" name="surname" type="text"
                       class="form-control @if ($errors->first('surname')) is-invalid @endif"
                       value="{{ old('surname') }}">
                <div class="invalid-feedback">Nieprawidłowe nazwisko!</div>
            </div>
            <div class="form-group mb-2">
                <label for="age" class="form-label">Wiek</label>
                <input id="age" name="age" type="number"
                       class="form-control @if ($errors->first('age')) is-invalid @endif" value="{{ old('age') }}">
                <div class="invalid-feedback">Nieprawidłowy wiek!</div>
            </div>
            <div class="form-group mb-2">
                <label for="phone_number" class="form-label">Numer telefonu</label>
                <input id="phone_number" name="phone_number" type="text"
                       class="form-control @if ($errors->first('phone_number')) is-invalid @endif"
                       value="{{ old('phone_number') }}">
                <div class="invalid-feedback">Nieprawidłowy numer telefonu!</div>
            </div>
            <div class="form-group mb-2">
                <label for="pesel" class="form-label">Pesel</label>
                <input id="pesel" name="pesel" type="text"
                       class="form-control @if ($errors->first('pesel')) is-invalid @endif" value="{{ old('pesel') }}">
                <div class="invalid-feedback">Nieprawidłowyp pesel!</div>
            </div>
            <div class="form-group mb-2">
                <label for="user_name" class="form-label">login</label>
                <input id="user_name" name="user_name" type="text"
                       class="form-control @if ($errors->first('user_name')) is-invalid @endif" value="{{ old('user_name') }}">
                <div class="invalid-feedback">Nieprawidłowy login!</div>
            </div>
            <div class="form-group mb-2">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text"
                       class="form-control @if ($errors->first('email')) is-invalid @endif" value="{{ old('email') }}">
                <div class="invalid-feedback">Nieprawidłowy email!</div>
            </div>
            <div class="form-group mb-2">
                <label for="password" class="form-label">Hasło</label>
                <input id="password" name="password" type="password"
                       class="form-control @if ($errors->first('password')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe hasło!</div>
            </div>
            <div class="text-center mt-4 mb-4">
                <input class="btn btn-primary" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

@include('shared.footer')
