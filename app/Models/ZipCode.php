<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    protected $fillable = ['zip_code', 'locality', 'municipality_id'];
    public $timestamps  = false;
    protected $primaryKey = 'zip_code';
    protected $hidden = ['municipality_id'];
    protected $appends = ['federal_entity'];
    protected $casts = ['zip_code'=>'string'];
  

    public function getFederalEntityAttribute()
    {
        return $this->municipality->federal_entity;
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
