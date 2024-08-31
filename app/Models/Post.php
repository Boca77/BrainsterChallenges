<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = null;

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function category()
    {

        return $this->belongsTo(Categories::class);
    }

    public function isApproved()
    {

        return $this->approved;
    }
}
