<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'application_id',
        'body'
    ];


    public function user(){
        $this->belongsTo(User::class);
    }
}
