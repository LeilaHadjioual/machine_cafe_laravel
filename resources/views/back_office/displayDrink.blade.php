@extends('template.back_office.default_template')

@section('titre')
    Boisson selectionnée
@stop

@section ('content')

    <div class=" ">
        <h2>{{$drink->nom}}</h2>
        <h3>Prix = {{$drink->prix}} cts</h3>
        <p>Nb total de ventes = {{$drink->ventes->count()}}
    </div>
    <!-- forumlaire pour modifier la boisson ou son prix -->
    <div class="col-sm-6 push-3">
        <form class="form-inline" action="/drinks/{{$drink->id}}" method="post">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <!-- <input type="hidden" name="_method" value="put"></input> -->
            <input type="text" class="form-control" placeholder="nomBoisson" name="nom" value="{{$drink->nom}}"></input>
            <input type="text" class="form-control" name="prix" placeholder="prixBoisson" value="{{$drink->prix}}"></input>
            <button type="submit" class="btn btn-outline-secondary">modifier</button>
        </form>
    </div></br>

    <h2>Recette {{$drink->nom}}</h2>
    <table class="table table-bordered">
        <thead>
        <tr class="table-danger">
            <th>ref</th>
            <th>Boisson</th>
            <th>Ingredients id</th>
            <th>Ingredients</th>
            <th>quantité</th>
            <th>supp</th>
        </tr>
        </thead>
        @foreach ($drink->ingredients as $ingredient)
            <tr>
                <td>{{$ingredient->pivot->id}}</td>
                <td>{{$drink->nom}}</td>
                <td>{{$ingredient->pivot->ingredient_id}}</td>
                <td>{{$ingredient->nomIngredient}}</td>
                <td>{{$ingredient->pivot->nbDose}}</td>
                <td>
                    <form id="delete{{$ingredient->pivot->id}}" method="post"
                          action="/recipe/{{$drink->id}}/{{$ingredient->id}}">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <div class="btn-group">
                            <button type="submit" form="delete{{$ingredient->pivot->id}}"
                                    class="btn btn-outline-danger"> X
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
    </table></br>

    <h3>Ajouter un ingrédient</h3>
    <form class="form-inline col-sm-12 push-3" method="post" action="/recipe/create/{{$drink->id}}">
        {{ csrf_field() }}
        <select class="form-control col-sm-3" name="ingredient">
            @foreach($allIngredients as $ingredient)
                <option value="{{$ingredient->id}}">{{$ingredient->nomIngredient}}</option>
            @endforeach
        </select>
        </br>
        <input type="text" name="nbDose" class="form-control" placeholder="quantité" required="required">
        <button type="submit" class="btn btn-outline-secondary" name="valider">valider</button>
    </form>

@stop