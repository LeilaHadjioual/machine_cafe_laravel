<?php

namespace App\Http\Controllers;

use App\Vente;
use App\Drink;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    function index()
    {
        /*$commande = DB::select('
            SELECT refcommandes, date, nbsucres,boissons_code
            FROM commandes');

        return view('back_office.commandes', ['commande'=> $commande]);

    }*/
        //affiche la liste des boissons de tous les utilisateurs
//        $data = [
//          'ventes' => Vente::all()->load('drink'), //load fait la meme chose que with, récupère la relation
//           'ventes'=> Vente::with('drink')->orderBy('created_at', 'asc')->get();
//          'drinks' => Drink::all(),
//            ];
//            return view('back_office.ventes', $data);

        if (\Auth::user()->role === 'admin') {
            $ventes = Vente::with('drink')->orderBy('created_at', 'asc')->get();
        } else {
            $ventes = Vente::where('user_id', Auth::user()->id)->get();
        }
        return view('back_office.ventes', ['ventes' => $ventes]);
    }

//ajoute une vente
    public function store(Request $request)
    {
        //créer une nouvelle vente liée à l'utilisateur
        $vente = new Vente();
        $vente->nbSucre = request('inputNbSucre');
        $vente->drink_id = request('inputBoisson');
        $vente->user()->associate(Auth::user());
        $vente->save();
//idem créer une nouvelle vente
//        if (Auth::user()) { //authentification de l'utilisateur
//        $user_id = Auth::user()->id; //si user id correspond à un id utilisateur, recupère id
//    } else {
//        $user_id = null; //sinon valeur = à null
//    }
//        $atribute = [
//            'nbSucre' => request('inputNbSucre'),
//            'drink_id' => request('inputBoisson'),
//            'user_id' => $user_id,
//        ];
//        Vente::create($atribute);

        /*récupère dans le model Drink un tableau avec la liste des boissons. [0]:position 0 du tableau
        autre syntaxe :
        $boissons = Drink::whereNom(request('inputBoisson'))->get();
        $boisson = $boissons[0];*/
        return redirect()->back();
    }

//supprime une commande
    public function destroy($id)
    {
        $vente = Vente::find($id);
        $vente->delete();

        return redirect()->back();
    }

////affiche la liste des boissons disponible sur la vue préparation (front)
//    function showDrink()
//    {
//        $data = [
//            'drinks' => Drink::all(),
//        ];
//        return view('front_office.preparation', $data);
//    }
}



