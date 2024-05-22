@include('shared.html')

@include('shared.head', ['pageTitle' => 'Łowiska'])

@include('shared.navbar')
<div class="row mt-4 mb-4 text-center">
    <h1>Edytuj dane połowu</h1>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-6">
        <form method="POST" action="{{ route('haul.update', $haul->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="form-group mb-2">
                <label for="fisherman_id" class="form-label">Rybak</label>
                <select id="fisherman_id" name="fisherman_id" class="form-control @if ($errors->first('fisherman_id')) is-invalid @endif">
                    @foreach($fishermen as $fisherman)
                        <option value="{{ $fisherman->id }}" {{ $haul->fisherman_id == $fisherman->id ? 'selected' : '' }}>
                            {{ $fisherman->name }} {{ $fisherman->surname }} (PESEL: {{ $fisherman->pesel }})
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Nieprawidłowy rybak!</div>
            </div>
            <div class="form-group mb-2">
                <label for="fish_id" class="form-label">Ryba</label>
                <select id="fish_id" name="fish_id" class="form-control @if ($errors->first('fish_id')) is-invalid @endif">
                    @foreach($fish as $fishes)
                        <option value="{{ $fishes->id }}" {{ $haul->fish_id == $fishes->id ? 'selected' : '' }}>{{ $fishes->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Nieprawidłowa ryba!</div>
            </div>
            <div class="form-group mb-2">
                <label for="fishery_id" class="form-label">Łowisko</label>
                <select id="fishery_id" name="fishery_id" class="form-control @if ($errors->first('fishery_id')) is-invalid @endif">
                    @foreach($fisheries as $fishery)
                        <option value="{{ $fishery->id }}" {{ $haul->fishery_id == $fishery->id ? 'selected' : '' }}>{{ $fishery->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Nieprawidłowe łowisko!</div>
            </div>
            <div class="form-group mb-2">
                <label for="data" class="form-label">Data</label>
                <input id="data" name="data" type="date" class="form-control @if ($errors->first('date')) is-invalid @endif" value="{{ $haul->data }}">
                <div class="invalid-feedback">Nieprawidłowa data!</div>
            </div>

            <div class="text-center mt-4 mb-4">
                <input class="btn btn-success" type="submit" value="Wyślij">
            </div>
        </form>
    </div>
</div>

@include('shared.footer')
