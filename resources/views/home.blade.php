@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

@include('shared.navbar')

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="storage/img/carousel1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="storage/img/carousel2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="storage/img/carousel3.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="jumbotron text-center mt-5">
    <div class="container">
        <h2 class="display-4">Witaj w klubie wędkarskim!</h2>
        <p class="lead">
            Nasz klub wędkarski to idealne miejsce dla miłośników wędkarstwa. Oferujemy szeroki wybór atrakcji,
            możliwość uczestnictwa w zawodach, oraz wiele cennych porad i wskazówek od doświadczonych wędkarzy.
            Dołącz do nas już dziś i poznaj magię rybackich przygód!
        </p>
    </div>
</section>

<div class="container mb-5">
    <div class="row">
        <div class="col-md-4 mt-2">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Zawody wędkarskie</h5>
                    <p class="card-text">Sprawdź nasz harmonogram zawodów i bierz udział w emocjonujących rywalizacjach.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Wypożyczalnia sprzętu</h5>
                    <p class="card-text">Nie masz własnego sprzętu? Skorzystaj z naszej wypożyczalni!</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Warsztaty i szkolenia</h5>
                    <p class="card-text">Przyjdź na nasze warsztaty i szkolenia, aby podnieść swoje umiejętności wędkarskie.</p>
                </div>
            </div>
        </div>
    </div>
</div>


@include('shared.footer')
