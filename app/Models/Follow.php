<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primary_key = ['follower_id', 'following_id'];

    protected $fillable = [
        'follower_id',
        'following_id',
        'status'
    ];

}
