<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['nomIngredient', 'stock'];

    public function boissons()
    {
        return $this->belongsToMany('App\Drink')->withPivot('id', 'nbDose');
    } //un ingredient peut appartenir à plusieurs boissons (pivot cf explication model drink)
}