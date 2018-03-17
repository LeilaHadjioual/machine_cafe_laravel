<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    protected $fillable = ['nbSucre', 'drink_id', 'user_id'];

    public function drink()
    {
        return $this->belongsTo('App\Drink');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
