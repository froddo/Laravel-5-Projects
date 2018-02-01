<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rnb extends Model
{
    protected $table = 'rnbs';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
