<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaMemberType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'des',
    ];
}
