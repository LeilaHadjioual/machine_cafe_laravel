<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DrinkController extends Controller
{
    function index()
    {
        /*$boisson = DB::select('SELECT code, nomboissons FROM boissons');*/
        $boisson = Drink::select('nom', 'prix', 'id')->get();
        return view('back_office.drinks', ['boisson' => $boisson]);
    }

//affiche liste boissons et prix avec requete mysql
    /*function lien($code){
        $boissons = DB::select("SELECT nomboissons, prix FROM boissons WHERE code='$code' ");

        return view('back_office/resultBoisson', ['boissons'=>$boissons[0]]);
    }*/

//trie par prix
    function orderPrix()
    {
        $boisson = Drink::select('nom', 'prix', 'id')->orderBy('prix', 'asc')->get();
        return view('back_office.drinks', ['boisson' => $boisson]);
    }

//trie par nom boisson
    function orderName()
    {
        $boisson = Drink::select('nom', 'prix', 'id')->orderBy('nom', 'asc')->get();
        return view('back_office.drinks', ['boisson' => $boisson]);
    }

//ajoute une nouvelle boisson dans la BDD(vue formadddrink)
    public function store(Request $request)
    {
        $drink = new Drink();//instancie une classe drink
        $drink->nom = request('inputName');// attribue le résultat des données saisies dans inputname à l'attribut nom(champ de la table qui devient un attribut grace à laravel)
        $drink->prix = request('inputPrice');
        $drink->save();
        return redirect('drinks');
    }

//supprime une boisson
    public function destroy($id)
    {
        $boisson = Drink::find($id);
        $ventes = $boisson->ventes;//utilise la méthode ventes() définie dans le model drink

        foreach ($ventes as $vente) {
            $vente->drink()->dissociate();//dissocie les ventes des boissons pour avoir une trace de la vente si la boisson n'existe plus mais les données affichées seront "null"
        }
        $boisson->delete();
        return redirect()->back();
    }

//modifie une boisson selectionnée
    public function update(Request $request, $id)
    {    /*$this->validate($request, [
		'nom' => 'required',
		prix' => 'required',]);*/
        $boisson = Drink::find($id);
        $boisson->update($request->all());
        $boisson->save();

        return redirect()->back();
    }

//créer le lien pour afficher la boisson et le prix dans une autre vue displaydrink
    function show(Drink $id)
    {    /*$boisson =Drink::find($id);*/
        $drink = $id->load('ingredients'); // load relation avec ingredients
        $allIngredients = Ingredient::all(); // récupère toutes les données du model ingredient
        $allIngredients = $allIngredients->diff($drink->ingredients); //différence entre les données présentes et absentes (affiche les ingrédients qui ne sont pas déjà présents dans la recette)
        $data = [
            'drink' => $drink,
            'allIngredients' => $allIngredients,
        ];

        return view('back_office.displayDrink', $data);
    }

    //affiche la liste des boissons disponible sur la vue préparation (front)
    function showDrink()
    {
        $data = [
            'drinks' => Drink::all(),
        ];
        return view('front_office.preparation', $data);
    }

////fonctions deplacées dans recipecontroller
/// ajouter un ingredient et quantité avec la liste déroulante
//    public function addRecipe(Request $request, Drink $drink)
//    {    // $ingredient récupère l'id de l'ingredient via la requete
//        $ingredient = Ingredient::find($request->input('ingredient'));
//        $nbDose = $request->input('nbDose');
//
//        $drink->ingredients()->attach($ingredient, ['nbDose' => $nbDose]);
//
//        return redirect()->back();
//    }
//
////supprimer un ingrédient
//    public function destroyIng($drink_id, $ingredient_id)
//    {
//        $ingredient = Ingredient::find($ingredient_id);
//        $drink = Drink::find($drink_id);
//        $drink->ingredients()->detach($ingredient);
//
//        return redirect()->back();
//    }


}

