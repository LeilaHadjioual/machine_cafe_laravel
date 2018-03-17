@extends('template.back_office.default_template')

@section('titre')
    Stocks ingrédients

@stop
@section ('content')
    <table class="table">
        <thead>
        <tr class="table-active">
            <th scope="col">Réf</th>
            <th scope="col"><a href="/ingredients/orderbyname">Ingrédient</a></th>
            <th scope="col"><a href="/ingredients/orderbynb">Quantité</a></th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($stock as $type => $resultat)
            <tr>
                <td>{{$resultat->id}}</td>
                <td>{{$resultat->nomIngredient}}</td>
                <td>
                    <div class="btn btn-secondary">{{$resultat->stock}}
                    </div>
                </td>
                <td>
                    <form id="delete{{$resultat->id}}" method="post" action="ingredients/{{$resultat->id}}">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}

                        <div class="btn-group">
                            <button type="submit" form="delete{{$resultat->id}}" class="btn btn-outline-danger"> X
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfooter>
            <form action="/ingredients/create" method="post">
                {{ csrf_field() }}
                <td class="form-group">
                    <input type="text" name="inputname" class="form-control" placeholder="Type">
                </td>
                <td class="form-group">
                    <input type="text" name="inputQté" class="form-control" placeholder="Quantité">
                </td>
                <td>
                    <button type="submit" name="valider" class="btn btn-outline-success">add</button>
                </td>
            </form>
        </tfooter>
    </table>
@stop

