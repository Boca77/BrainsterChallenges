<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;

class GameController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();

        return view('add.match', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        Game::create($request->all());

        $games = Game::with('away', 'home')->get();

        return redirect()->route('home', compact('games'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        $home = $game->home;
        $away = $game->away;

        return view('game', compact('game', 'away', 'home'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $home = $game->home;
        $away = $game->away;

        $teams = Team::all();

        return view('edit.match', compact('game', 'away', 'home', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, Game $game)
    {
        $games = Game::with('away', 'home')->get();

        $game->update($request->all());

        return redirect()->route('home', compact('games'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->back();
    }
}
