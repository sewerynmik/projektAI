@include('shared.html')

@include('shared.head', ['pageTitle' => 'Ryby'])

<body>
@include('shared.navbar')


<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
{{--                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg"--}}
{{--                     role="img"--}}
{{--                     aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>--}}
{{--                        Placeholder</title>--}}
{{--                    <rect width="100%" height="100%" fill="#868e96"></rect>--}}
{{--                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>--}}
{{--                </svg>--}}

                <img src="{{ asset('storage/img/'.$fish->image) }}" alt="">

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $fish->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $fish->species }}</li>
                    <li class="list-group-item">{{ $fish->description }}</li>
                </ul>
                @can('is-admin')
                    <div class="card-footer d-flex justify-content-around">
                        <a href="{{ route('fish.edit', $fish->id) }}" class="btn btn-primary">Edytuj</a>
                        <form method="POST" action="{{ route('fish.destroy', $fish->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Usuń">
                        </form>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>

</body>
