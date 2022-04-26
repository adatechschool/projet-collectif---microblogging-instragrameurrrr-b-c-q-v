<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    use HasFactory;

    public function follower()
{
    return $this->belongsTo(Followers::class);
}

protected $fillable = [
    'id',
    'followed_user_id',
    'following_user_id',
];
}
