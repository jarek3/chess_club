<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\GameStoreRequest;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{
    protected $limit = 8;
    /**
     * Display a listing of the resource.
          *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)    {

        $games      = Game::with('users')->orderBy('id')->paginate($this->limit);
        $gamesCount = Game::with('users' )->count();

        return view('games.index', ['games' => $games], compact('games', 'gamesCount' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $game = new Game();
        return view("games.create", compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameStoreRequest $request)
    {
        $game = new Game();
        //$user=User::find($request->all());
        $game->white=$request->input('white');
        $game->black=$request->input('black');
        $game->winner=$request->input('winner');
        $game->whiteMoves=$request->input('whiteMoves');
        $game->blackMoves=$request->input('blackMoves');
        $game->minMovesGame= (new \App\Models\User)->minMovesUserGame();
        $user = User::first();
        $game->winCount();

        $game->save();
        //$user->save();

        $game->users()->attach(['white'=>$game->white, 'black'=>$game->black]);


        return redirect("games")->with("message", "New game was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::findOrFail($id);

        return view("games.edit", compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\GameUpdateRequest $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->update($request->all());

        return redirect("games")->with("message", "Game was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
                $game = Game::findOrFail($id);

                if ('delete')
                {
                    $game->forceDelete();
                }

                return redirect("/games")->with("message", "Game was deleted successfully");
    }

    public function user(User $user)
    {
        $userName = $user->name;

        $games = $user->games()
            ->latestFirst()
            ->simplePaginate($this->limit);

        return view("home.index", compact('games', 'userName', 'user'));

    }

    public function forceDestroy($id)
    {
        $game = Game::findOrFail($id);
        $game->forceDelete();

        return redirect('/games')->with('message', 'Game has been deleted successfully');
    }
}
