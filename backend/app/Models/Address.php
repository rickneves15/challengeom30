<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'cep',
        'address',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
