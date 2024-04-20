@extends('base')

@section('content')


    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Radiant</h1>
            <p>Vous êtes un joueur chevronné de Valorant, à la recherche d'un bien immobilier qui reflète votre passion pour le jeu ? Ne cherchez pas plus loin que l'Agence Radiant !</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
            <div class="col">
                @include('property.card')
            </div>
            @endforeach
        </div>
    </div>

@endsection