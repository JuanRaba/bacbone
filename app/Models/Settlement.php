<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'name', 'zone_type', 'settlement_type', 'zip_code_zip_code'];
    public $timestamps  = false;
    protected $primaryKey = 'key';
    protected $hidden = ['id','zip_code_zip_code'];
    protected $casts = ['settlement_type'=>'json'];

    public function zoneType():Attribute
    {
        return Attribute::make(get: fn($value) => strtoupper($value));
    }
}
