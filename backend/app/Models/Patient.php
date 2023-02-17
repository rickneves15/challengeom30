<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'avatar',
        'full_name',
        'mother_full_name',
        'birthday',
        'cpf',
        'cns'
    ];
}
