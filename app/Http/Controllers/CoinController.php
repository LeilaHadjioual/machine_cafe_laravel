<?php

namespace App\Http\Controllers;

use App\Piece;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class coinController extends Controller
{
    public function index()
    {
        $coins = Piece::select('id', 'coin', 'quantite')->get();

        return view('back_office.coins', ['coins' => $coins]);
    }


    public function orderCoin()
    {
        $coins = Piece::select('id', 'coin', 'quantite')->orderBy('coin', 'asc')->get();

        return view('back_office.coins', ['coins' => $coins]);
    }

    public function orderNb()
    {
        $coins = Piece::select('id', 'coin', 'quantite')->orderBy('quantite', 'asc')->get();

        return view('back_office.coins', ['coins' => $coins]);
    }


    public function store(Request $request)
    {
        $coins = new Piece();
        $coins->coin = request('inputCoin');
        $coins->quantite = request('inputNb');
        $coins->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $coin = Piece::find($id);
        $coin->delete();

        return redirect('/coins');


    }
}


