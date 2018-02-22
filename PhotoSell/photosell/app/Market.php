<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = 'markets';
    public $primaryKey = 'id';
    public $timestamps = true;
}
