<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;
    
    public $timestamps  = false;
    protected $fillable = ['key','name','code'];
    protected $primaryKey = 'key';
    
}
