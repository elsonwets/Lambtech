<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $table = 'conversations';

    protected $fillable = [
        'utilisateur1_id',
        'utilisateur2_id',
    ];
}
