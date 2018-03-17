<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    function index()
    {
        /*$stock_ingre = DB::select('
            SELECT idingredients, nomIngredients, enStock 
            FROM ingredients');

        return view('back_office.stocks', ['stock_ingre' => $stock_ingre]);
*/
        $stock = Ingredient::select('id', 'nomIngredient', 'stock')->get();

        return view('back_office.ingredients', ['stock' => $stock]);

    }

    public function orderIng()
    {
        $stock = Ingredient::select('id', 'nomIngredient', 'stock')->orderBy('nomIngredient', 'asc')->get();

        return view('back_office.ingredients', ['stock' => $stock]);

    }

    public function orderNb()
    {
        $stock = Ingredient::select('id', 'nomIngredient', 'stock')->orderBy('stock', 'asc')->get();

        return view('back_office.ingredients', ['stock' => $stock]);
    }


    public function store(Request $request)
    {
        $stock = new Ingredient();
        $stock->nomIngredient = request('inputname');
        $stock->stock = request('inputQté');
        $stock->save();





//        foreach ($ingredients as $ingredient){
//            $stock = Ingredient::find($ingredient->id);
//
//            $stock->stock -= $ingredient->pivot->nbDose;
//            $stock->save();
//        }

//                $sugar = Ingredient::find(3);
//                $sugar->stock -= request('selectSucre');
//                $sugar->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $stock = Ingredient::find($id);
        $stock->delete();

        return redirect('/ingredients');


    }
}