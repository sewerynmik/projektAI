@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
    @include('shared.navbar')

    <div class="row d-flex justify-content-center">
        <div class="col-10 col-sm-10 col-md-6 col-lg-4">
            <form method="POST" action="{{ route('login.authenticate') }}" class="needs-validation" novalidate>
                @csrf
                <div class="form-group mb-2">
                    <label for="login" class="form-label">Login</label>
                    <input id="login" name="login" type="text" class="form-control @if ($errors->first('login')) is-invalid @endif" value="{{ old('login') }}">
                    <div class="invalid-feedback">Nieprawidłowy login!</div>
                </div>
                <div class="form-group mb-2">
                    <label for="continent" class="form-label">Hasło</label>
                    <input id="password" name="password" type="password" class="form-control @if ($errors->first('password')) is-invalid @endif">
                    <div class="invalid-feedback">Nieprawidłowe hasło!</div>
                </div>
                <div class="text-center mt-4 mb-4">
                    <input class="btn btn-primary" type="submit" value="Wyślij">
                </div>
            </form>
        </div>
    </div>
</body>
