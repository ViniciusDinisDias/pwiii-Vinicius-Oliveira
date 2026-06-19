<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required|min:2',
            'genre'        => 'required',
            'release_year' => 'required|integer|min:1970|max:2025',
            'rating'       => 'required|numeric|min:0|max:10',
        ]);

        Game::create($request->all());
        return redirect('/games')->with('success', 'Jogo adicionado!');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'        => 'required|min:2',
            'genre'        => 'required',
            'release_year' => 'required|integer|min:1970|max:2025',
            'rating'       => 'required|numeric|min:0|max:10',
        ]);

        $game = Game::findOrFail($id);
        $game->update($request->all());
        return redirect('/games')->with('success', 'Jogo atualizado!');
    }

    public function destroy($id)
    {
        Game::findOrFail($id)->delete();
        return redirect('/games')->with('success', 'Jogo removido!');
    }
}