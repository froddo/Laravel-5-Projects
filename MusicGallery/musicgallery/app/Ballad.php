<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ballad extends Model
{
    protected $table = 'ballads';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
