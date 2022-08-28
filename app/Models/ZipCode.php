<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['zip_code', 'locality', 'municipality_id'];
    public $timestamps  = false;
    protected $primaryKey = 'zip_code';
    protected $hidden = ['municipality_id'];
    //protected $appends = ['federal_entity'];
    protected $casts = ['zip_code'=>'string'];

    public function toSearchableArray()
    {
       $zc = $this->with('municipality','municipality.federal_entity','settlements')->where("zip_code", $this->zip_code)->first();
       $zc->federal_entity=$zc->municipality->federal_entity;
       $json = json_encode($zc);
       return json_decode($json, true);
    }

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
