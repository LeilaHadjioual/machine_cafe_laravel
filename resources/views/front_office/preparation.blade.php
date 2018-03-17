@extends('template.front_office.default_template')

@section('titre')
    Préparation des boissons
@stop

@section('content')
    <h3>Boissons</h3>
    <form action="/ventes/store" method="post">
        {{ csrf_field() }}
        <div class="col-sm-4 push-4">
            <select name="inputBoisson" class="form-control" id="sel1">
                {{--récupère la liste des boissons via la méthode showDrink--}}
                <option selected disabled value="nomBoissonselection">sélectionner une boisson</option>
                @foreach($drinks as $drink)
                    <option value="{{$drink->id}}">{{$drink->nom}} ~~ {{$drink->prix}} cts</option>
                @endforeach
            </select></br>
            <h3> Nombre de sucre </h3>
            <input type="text" name="inputNbSucre" class="form-control" placeholder="saisir le nb de sucre">
            </br>
        </div>

        <div class="col-sm-2 push-5">
            <button type="submit" name="valider" class="btn btn-outline-secondary">valider</button>
        </div>
        <br>
    </form>

    <img src="https://www.thingstodoinprinceedwardcounty.ca/wp-content/uploads/2013/12/coffee.png" alt="image boisson"/>
@endsection