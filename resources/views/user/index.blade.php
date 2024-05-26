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
                    <div class="d-flex justify-content-around">
                        <a href="" class="btn btn-success">Zmień dane</a>
                        <a href="" class="btn btn-primary">Zmień email</a>
                        <a href="" class="btn btn-secondary">Zmień nazwe</a>
                        <a href="" class="btn btn-warning">Zmień hasło</a>
                    </div>
                </div>
            </div>
        </div>

        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    function randomColor() {
        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);
        return "rgb(" + r + "," + g + "," + b + ")";
    }


    let ctx = document.getElementById("myChart").getContext("2d");
    let myChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: [
                @foreach($hauls as $haul)
                    "{{ $haul->fish->name }}",
                @endforeach
            ],
            datasets: [
                {
                    label: "Liczba złowionych ryb",
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
</script>

@include('shared.footer')
