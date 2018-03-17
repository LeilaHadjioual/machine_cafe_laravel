<?php

namespace App\Http\Controllers;


use App\Ingredient;
use App\Drink;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class recipeController extends BaseController
{
    /*function showRecipes(Drink $drink)
    {
        $allrecipes = DB::select('
            SELECT nomboissons, nomIngredients, QteIngredient 
            FROM boissons_ingredients
            INNER JOIN ingredients 
            ON boissons_ingredients.ingredients_idingredients =  ingredients.idingredients 
            INNER JOIN boissons 
            ON boissons.code = boissons_ingredients.boissons_code');

        return view('back_office/recettes', ['allrecipes' => $allrecipes]);

        $recipes = $drink->ingredients;

        return view('back_office/resultBoisson', ['drink' => $drink, 'recipes' => $recipes]);
    }*/

    /* function listIng(){
         $boisson = DB::select('SELECT code, nomboissons FROM boissons');
         $ingredients = Ingredient::select('nomIngredient')->get();

         return view('back_office/boissons', ['ingredients'=> $ingredients]);

     }*/

//Récupèrer les ingrédients d'une boisson
    public function index()
    {
        /*$recipe = DB::table('drink_ingredient')->get();*/
        //$drinks= Drink::all()->load('ingredients'); fait la meme chose qu'avec methode with
        $drinks = Drink::with('ingredients')->get();
        //Retourner la vue avec les données
        return view('back_office.recipes', ["drinks" => $drinks]);
    }

//ajouter un ingredient et quantité avec la liste déroulante
    public function create(Request $request, Drink $drink)
    {    // $ingredient récupère l'id de l'ingredient via la requete
        $ingredient = Ingredient::find($request->input('ingredient'));
        $nbDose = $request->input('nbDose');
        $drink->ingredients()->attach($ingredient, ['nbDose' => $nbDose]);

        return redirect()->back();
    }

//supprimer un ingrédient de la recette
    public function destroyIng($drink_id, $ingredient_id)
    {
        $ingredient = Ingredient::find($ingredient_id);
        $drink = Drink::find($drink_id);
        $drink->ingredients()->detach($ingredient);

        return redirect()->back();
    }

}

?>