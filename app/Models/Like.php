<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function posts()
{
    return $this->belongsTo(Post::class);

}
public function user()
{
    return $this->belongsTo(User::class);
    
}
protected $fillable = [
    'id',
    'post_id',
    'user_id',
];
}
