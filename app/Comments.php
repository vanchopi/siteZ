<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comments extends Model
{
    public static function findItem($id)
    {
        return $query = DB::table('comments')->where('item_id','=',$id)->get();
    }
    public static function findItems()
    {
        return $query = DB::table('comments')->whereNotNull('item_id')->get();
    }

}
