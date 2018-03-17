@extends('template.back_office.default_template')

@section('titre')
    Gestion des commandes
@stop

@section('content')
    <table class="table ">
        <thead class=" table-active">
        <tr>
            <th>Ref commande</th>
            <th>Boisson</th>
            <th>Prix</th>
            <th>Nb sucre</th>
            <th>Code boisson</th>
            <th>Date vente</th>
            <th>user</th>
            <th>supp</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ventes as $vente)
            <tr>
                <td>{{$vente->id}} </td>
                @if ($vente->drink)
                    {{--condition qui permet d'afficher la vente de la boisson au cas où ingrédient n'existe plus--}}
                    <td>{{$vente->drink->nom}} </td>
                    <td>{{$vente->drink->prix}} </td>
                @else
                    {{--si ingredient n'existe plus, affiche null pour la valeur de la boisson et son prix--}}
                    <td>boisson supprimée</td>
                    <td>boisson supprimée</td>
                @endif
                <td>{{$vente->nbSucre}}</td>
                <td>{{$vente->drink_id}}</td>
                <td>{{$vente->created_at}}</td>
                <td>
                    @if($vente->user)
                        {{--condition qui affiche le nom de l'utilisateur s'il est connu, sinon affiche "guest--}}
                        {{$vente->user->name}}
                    @else
                        Guest
                    @endif
                </td>
                {{--bouton supprimer--}}
                <td>
                    <form id="delete{{$vente->id}}" method="post" action="ventes/{{$vente->id}}">
                        <div class="btn">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit" form="delete{{$vente->id}}" class="btn btn-outline-danger"> X</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{--formulaire pour effectuer les tests de ventes--}}
        {{--<tfooter>--}}
            {{--<tr>--}}
                {{--<form action="/ventes/store" method="post">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<td>--}}
                        {{--<select name="inputBoisson" class="form-control" id="sel1">--}}
                            {{--@foreach($drinks as $drink)--}}
                                {{--<option value="{{$drink->id}}">{{$drink->nom}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<input type="text" name="inputNbSucre" class="form-control" placeholder="nb sucre">--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--<button type="submit" class="btn btn-outline-success" name="valider">--}}
                            {{--add--}}
                        {{--</button>--}}
                    {{--</td>--}}
                {{--</form>--}}
            {{--</tr>--}}
        {{--</tfooter>--}}
    </table>
@stop