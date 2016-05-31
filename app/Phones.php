<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Phones extends Model
{
    public static function allnotusers()
    {
        $notusers = DB::table('phones')->get();
        return $notusers;
    }
    public static function allusers()
    {
        $users = DB::table('phones')
            ->join('users','phones.user_id','=','users.id')
            ->select('phones.*','users.name')
            ->get();
        return $users;
    }
}
