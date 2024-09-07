<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = null;

    public function home()
    {
        return $this->hasMany(Game::class, 'home_id');
    }

    public function away()
    {
        return $this->hasMany(Game::class, 'away_id');
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
