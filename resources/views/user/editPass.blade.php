@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj hasło</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('users.updatePass', $user->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="oldpass" class="form-label">Stare hasło</label>
                <input id="oldpass" name="oldpass" type="text"
                       class="form-control @if ($errors->first('password')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe hasło!</div>
            </div>
            <div class="form-group mb-2">
                <label for="newpass" class="form-label">Nowe hasło</label>
                <input id="newpass" name="newpass" type="text"
                       class="form-control @if ($errors->first('password')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe hasło!</div>
            </div>
            <div class="form-group mb-2">
                <label for="description" class="form-label">Powtórz nowe hasło</label>
                <input id="description" name="description" type="text"
                       class="form-control @if ($errors->first('description')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowe hasło!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

</body>
