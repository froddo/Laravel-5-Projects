<?php

namespace App;

use App\Http\Controllers\MessagesController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    public static function orderBy()
    {
        $result = DB::select('SELECT * FROM `messages` ORDER BY id DESC');
        if (empty($result)){
            MessagesController::check();
        }
        return $result;
    }

}
