@extends('template.back_office.default_template')

@section('titre')
    Gestion des pieces
@endsection

@section('content')
    <table class="table">
        <thead>
        <tr class="table-active">
            <th scope="col">Réf</th>
            <th scope="col"><a href="/coins/orderbycoin">Type</a></th>
            <th scope="col"><a href="/coins/orderbynb"> Nombre</a></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {{--affiche les pièces et quantité--}}
        @foreach($coins as $type => $number)
            <tr>
                <td>{{$number->id}}</td>
                <td>{{$number->coin}} cts</td>
                <td>
                    <div class="btn btn-secondary">
                        {{$number->quantite}}
                    </div>
                </td>
                <td>
                    {{--supprime la ligne--}}
                    <form id="delete{{$number->id}}" method="post" action="coins/{{$number->id}}">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}

                        <div class="btn-group">
                            <button type="submit" form="delete{{$number->id}}" class="btn btn-outline-danger"> X
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfooter>
            <tr>
                <form action="/coins/create" method="post">
                    {{ csrf_field() }}
                    <td>
                        <input type="text" name="inputCoin" class="form-control" placeholder="Type">
                    </td>
                    <td>
                        <input type="text" name="inputNb" class="form-control" placeholder="Nombre">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-success" name="valider">
                            add
                        </button>
                    </td>
                </form>
            </tr>
        </tfooter>
    </table>
@endsection