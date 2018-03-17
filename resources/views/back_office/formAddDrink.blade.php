@extends('template.back_office.default_template')

@section('titre')
    Ajouter une boisson
@stop

@section('content')
    <!-- forumlaire ajout boisson -->
    <form action="/drinks/create" method="post">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-sm-4 push-1">
                <input type="text" class="form-control" name="inputName" placeholder="saisir le nom d'une boisson">
            </div>

            <div class="col-sm-4 push-1">
                <input type="text" class="form-control" name="inputPrice" placeholder="saisir un prix">
            </div>

            <div class="col-sm-2 push-1">
                <button type="submit" name="valider" class="btn btn-outline-secondary">valider</button>
            </div>
        </div>
    </form>

    <img src="https://i1.wp.com/www.stompinggroundsgreer.com/wp-content/uploads/2017/02/cropped-favicon.gif?fit=240%2C240&ssl=1"/>

@stop