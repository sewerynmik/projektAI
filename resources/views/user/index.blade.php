@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

@include('shared.navbar')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil użytkownika</div>

                <div class="card-body">
                    <p><strong>Imię:</strong> {{ $user->fisherman->name }}</p>
                    <p><strong>Email:</strong> {{ $user->fisherman->surname }}</p>
                    <p><strong>Wiek:</strong> {{ $user->fisherman->age }}</p>
                    <p><strong>Numer telefonu:</strong> {{ $user->fisherman->phone_number }}</p>
                    <p><strong>Pesel:</strong> {{ $user->fisherman->pesel }}</p>
                    <hr>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Nazwa:</strong> {{ $user->name }}</p>
                    <hr>
                    <div class="row row-cols-2 row-cols-lg-4">
                        <div class="col mb-2">
                            <a href="{{ route('users.edit') }}" class="btn btn-success w-100">Zmień dane</a>
                        </div>
                        <div class="col mb-2">
                            <a href="{{ route('users.editEmail') }}" class="btn btn-primary w-100">Zmień email</a>
                        </div>
                        <div class="col mb-2">
                            <a href="{{route('users.editName')}}" class="btn btn-secondary w-100">Zmień nazwę</a>
                        </div>
                        <div class="col mb-2">
                            <a href="{{ route('users.editPass') }}" class="btn btn-warning w-100">Zmień hasło</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <canvas id="chartFish"></canvas>
            </div>
            <div class="col-lg-6  mt-lg-0 mt-5">
                <canvas id="chartFishery"></canvas>
            </div>
        </div>

    </div>
</div>

<script>
    function randomColor() {
        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);
        return "rgb(" + r + "," + g + "," + b + ")";
    }


    let Fish = document.getElementById("chartFish").getContext("2d");
    let FishChart = new Chart(Fish, {
        type: "pie",
        data: {
            labels: [
                @foreach($hauls as $haul)
                    "{{ $haul->fish->name }}",
                @endforeach
            ],
            datasets: [
                {
                    label: "Złowione ryby",
                    data: [
                        @foreach($hauls as $haul)
                                {{ $haul->total }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($hauls as $haul)
                        randomColor(),
                        @endforeach
                    ],
                },
            ],
        },
    });

    let Fishery = document.getElementById("chartFishery").getContext("2d");
    let FisheryChart = new Chart(Fishery, {
        type: "pie",
        data: {
            labels: [
                @foreach($fisheries as $fishery)
                    "{!! str_replace('"', '\"', htmlspecialchars_decode($fishery->fishery->name)) !!}",
                @endforeach
            ],
            datasets: [
                {
                    label: "Łowiska na których złapano ryby",
                    data: [
                        @foreach($fisheries as $fishery)
                                {{ $fishery->total }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($fisheries as $fishery)
                        randomColor(),
                        @endforeach
                    ],
                },
            ],
        },
    });

</script>

@include('shared.footer')
