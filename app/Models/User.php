<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * @var mixed
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'date_of_entry',
        'password',
        'gamesCount',
        'winCount',
        'lossCount',
        'number_of_moves',
        'countWinWhite',
        'countWinBlack',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    use HasFactory;


    public function white()
    {
        return $this->hasMany(Game::class, 'winner')->where('white', '=', $this->id);

    }

    public function black()
    {
        return $this->hasMany(Game::class, 'winner')->where('black', '=', $this->id);
    }

    public function winner()
    {
        return $this->hasMany(Game::class, 'winner');
    }

    public function getBlackFio()
    {
        return User::findOrFail($this->black)->name;
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_user', 'user_id', 'game_id');
    }

    public function gamesCountWhite()
    {
        return ($this->hasMany(Game::class, 'white'))->count();
    }

    public function gamesCountBlack()
    {
        return ($this->hasMany(Game::class, 'black'))->count();
    }

    public function gamesCount()
    {
        return $this->gamesCountWhite()+$this->gamesCountBlack();
    }

    public function winCount()
    {
       return $this->winner()->count();
    }

    public function lossCount()
    {
        return ($this->gamesCount()-$this->winCount());
    }

    public function selectUser($user)
    {
        return $this->belongsToMany(User::class);
    }

    public function setPasswordAttribute($value)
    {
        if (! empty($value)) $this->attributes['password'] = bcrypt($value);
    }

    public function getRouteKeyName(): string
    {
        return 'url';
    }

    public function getWinner()
    {
        return Game::findOrFail($this->winner)->name;
    }

    public function isWhite()
    {
        return $this->hasMany(Game::class, 'winner')->withOnly('white');
    }

    public function isBlack()
    {
        return $this->hasMany(Game::class, 'winner');
    }


    public function ratio()
    {
    if (($this->winner()->count())!==0)

        return ($this->white()->count().':'.($this->black())->count());

    else
        echo "NO WIN!";
    }

    public function whiteUserMoves()
    {
        if (($this->white())->count()!==0)
            return $this->hasMany(Game::class, 'white')->where('winner', '=', $this->id)->min('whiteMoves');
    }

    public function blackUserMoves()
    {
        if (($this->black())->count()!==0)
       return $this->hasMany(Game::class, 'black')->where('winner', '=', $this->id)->min('blackMoves');
    }

    public function minMovesUserGame()
    {
        return min($this->whiteUserMoves(), $this->blackUserMoves());
    }

    public function winWhiteCount()
    {
        return $this->white()->count();
    }

    public function winBlackCount()
    {
        return $this->black()->count();
    }

}
