<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['address', 'number', 'complement', 'zipcode', 'city', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class,'user','id');
    }

}
