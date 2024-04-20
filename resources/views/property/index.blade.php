@extends('base')

@section('title', 'Tout mes biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="get" class="container d-flex gap-2">
            <input type="number" placeholder="Surface minimum" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de pièce min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
            <input placeholder="Mot clef" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">Recherche</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
                <div class="col text-center">
                    <p>Aucun bien ne correspond à votre recherche</p>
                    <img src="https://preview.redd.it/f99yvx11ksz41.png?width=752&format=png&auto=webp&s=2d2d255478c2d88f91b5e6d00039c0bdebbd931f" alt="Aucun bien ne correspond à votre recherche">
                </div>
            @endforelse
        </div>

        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>


@endsection