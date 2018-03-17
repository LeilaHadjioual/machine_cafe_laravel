@extends('template.back_office.default_template')

@section('titre')
    Gestion des boissons
@stop

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="table-danger">
                <th><a href="/drinks/orderbyname">BOISSONS DISPONIBLES</a></th>
                <th><a href="/drinks/orderbyprix">PRIX</a></th>
                <th> EDIT</th>
                <th>SUPP</th>
            </tr>
            </thead>
            <!-- liste les boissons -->
            @foreach($boisson as $liste)
                <tr class="table-active">
                    <td>{{$liste->nom}}</td>
                    <td>{{$liste->prix}}</td>
                    <td><a href="/drinks/{{$liste->id}}">
                            <input type="button" class="btn btn-outline-basic" value="détails"></input></a></td>
                    <td>
                        {{--forumlaire supprime la boisson --}}
                        <form action="/drinks/{{$liste->id}}" method="post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-outline-danger"> X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{--button "ajouter une boisson" qui renvoit vers une autre vue et autre formulaire - vue formAjoutboisson--}}
        <div class="">
            <a href="/formAddDrink">
                <input type="button" class="btn-justified btn btn-outline-secondary" value="ajouter une boisson"></input></a>
        </div>
    </div>

@stop