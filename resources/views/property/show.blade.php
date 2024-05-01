@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container mt-4">

        <h1>{{$property->title}}</h1>
        <h2>${{$property->rooms}} pièces - {{ $property->surface }} m² </h2>

        <div class="text-primary fw-bold" style= "font-size: 4rem;">
            {{ number_format($property->price, thousands_separator:' ') }} €
        </div>

        <div class="mt-4">
            <h4>Intéressé par ce bien ?</h4>

            @include('shared.flash')

            <form action="{{ route('property.contact', $property) }}" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom', 'value' =>'AD'])
                    @include('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom', 'value' =>'Laurent'])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone', 'value' =>'07 69 38 77 71'])
                    @include('shared.input', ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email', 'value' =>'ad.laurent@show.fr'])
                </div>
                @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Votre Message', 'value' => 'Petit message pour ma pupuce'])
                <div>
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <p>{{ nl2br($property->description) }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Carcatéristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m² </td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->address }} <br>
                                {{ $property->city }} ({{ $property->postal_code}})
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @foreach($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection