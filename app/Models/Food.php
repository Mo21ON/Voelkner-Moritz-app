<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'detail', 'userID'                     //hier wird definiert welche Felder befüllt werden dürfen zur Erstellung des Models verwendet werden dürfen

    ];
}
