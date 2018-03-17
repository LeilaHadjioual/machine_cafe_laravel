@extends('template.back_office.default_template')

@section('titre')
    Liste des recettes
@stop

@section ('content')
    <table class="table table-bordered">
        @foreach ($drinks as $drink)
            {{-- boucle qui parcourt toutes les boissons et récupère une seule boisson pour pouvoir afficher la recette de la boisson--}}
            <tr class="table-danger">
                <th>{{$drink->nom}}</th>
                <th>quantité</th>
            </tr>
            @foreach($drink->ingredients as $ingredient)
            <!-- boucle qui parcourt les ingrédients d'une boisson -->
                <tr>
                    <td>{{$ingredient->nomIngredient}}</td>
                    <td>{{$ingredient->pivot->nbDose}}</td>
                </tr>
            @endforeach
        @endforeach

    </table>

@stop

