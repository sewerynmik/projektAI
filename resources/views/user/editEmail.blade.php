@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj naze konta</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('users.updateEmail', $user->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="email" class="form-label">Edytuj email</label>
                <input id="email" name="email" type="text"
                       class="form-control @if ($errors->first('email')) is-invalid @endif" value="{{ $user->email }}">
                <div class="invalid-feedback">Nieprawidłowy email!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

</body>
