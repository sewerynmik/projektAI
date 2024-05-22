@include('shared.html')

@include('shared.head', ['pageTitle' => 'Łowiska'])

@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Podaj dane połowu</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('haul.store') }}" class="needs-validation" novalidate>
            @csrf
            @method('POST')
            <input type="hidden" name="fisherman_id" value="{{ auth()->user()->fisherman->id }}">
            <div class="form-group mb-2">
                <label for="fish_id" class="form-label">Ryba</label>
                <select id="fish_id" name="fish_id" class="form-control @if ($errors->first('fish_id')) is-invalid @endif">
                    <option>Wybierz rybe</option>
                    @foreach($fish as $fishes)
                        <option value="{{ $fishes->id }}">
                            {{ $fishes->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Nieprawidłowa ryba!</div>
            </div>
            <div class="form-group mb-2">
                <label for="fishery_id" class="form-label">Łowisko</label>
                <select id="fishery_id" name="fishery_id" class="form-control @if ($errors->first('fishery_id')) is-invalid @endif">
                    <option>Wybierz łowisko</option>
                    @foreach($fisheries as $fishery)
                        <option value="{{ $fishery->id }}">
                            {{ $fishery->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Nieprawidłowe łowisko!</div>
            </div>
            <div class="form-group mb-2">
                <label for="data" class="form-label">Data</label>
                <input id="data" name="data" type="date" class="form-control @if ($errors->first('data')) is-invalid @endif">
                <div class="invalid-feedback">Nieprawidłowa data!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

@include('shared.footer')
