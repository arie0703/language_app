<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $fillable = ['title', 'body', 'tool', 'link', 'language', 'user_id'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}