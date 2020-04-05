<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['type','name','slug','value'];
    public $timestamps = false;
}
