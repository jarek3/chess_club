<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
     'white', 'black', 'winner', 'game_time', 'whiteMoves', 'blackMoves', 'minMovesGame', 'countWinWhite', 'countWinBlack', 'user_id'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'game_user', 'game_id', 'user_id')->using(UserGame::class)->withPivot('winCount');
    }


/*    public function getWinner()    {

       return User::findOrFail($this->winner)->name;
    }*/


    public function getWhite()
    {
        return User::findOrFail($this->white)->name;
    }

    public function getBlack()
    {
        return User::findOrFail($this->black)->name;
    }

    public function isWinner()
    {
        return User::findOrFail($this->winner)->name;
    }

    public function minMovesGame()
    {
        return min($this->whiteMoves, $this->blackMoves);
    }

    public function winCount()
    {
        return Game::with('users')->where('winner', '=', $this->id)->count();

    }

}
