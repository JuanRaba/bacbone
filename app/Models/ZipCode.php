<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = ['zip_code', 'locality', 'municipality_id'];
    public $timestamps  = false;


    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
    
    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
