<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = ['nom', 'prix'];//champs modifiable

    //construction du model

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withPivot('id', 'nbDose');
    }//une boisson peut avoir plusieurs ingrédients, le pivot créer la table intermédiaire, préciser les champs en plus existants dans le pivot(table drink_ingredient)

    public function ventes()
    {
        return $this->hasMany('App\Vente');
    } //une boisson peut avoir plusieurs ventes

}
