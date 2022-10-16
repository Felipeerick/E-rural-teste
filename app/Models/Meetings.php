<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'url', 'status', 'user_id','password'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
