@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

@include('shared.navbar')

<div class="d-flex justify-content-center mt-5">
    <div class="col-10 col-sm-10 col-md-6 col-lg-4">
        <form method="POST" action="{{ route('login.authenticate') }}" class="needs-validation" novalidate>
            @csrf

            <h1 class="d-flex justify-content-center">Logowanie</h1>
            <div class="form-group mb-2">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text"
                       class="form-control @if ($errors->first('email')) is-invalid @endif" value="{{ old('email') }}">
                <div class="invalid-feedback">Nieprawidłowy email!</div>
            </div>
            <div class="form-group mb-2">
                <label for="continent" class="form-label">Hasło</label>
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
