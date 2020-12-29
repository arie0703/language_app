<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['content','user_id', 'room_id'];

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
