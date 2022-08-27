<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    public $timestamps  = false;
    protected $fillable = ['key','name','federal_entity_key'];
    protected $hidden   = ['id', 'federal_entity_key', 'federal_entity'];

    public function federal_entity()
    {
        return $this->belongsTo(FederalEntity::class);
    }

}
