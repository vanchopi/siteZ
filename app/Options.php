<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Options extends Model
{
    protected $primaryKey = 'option_id';

    public static function getvalues($id)
    {
        $options = DB::table('options_values')->where('options_values.item_id','=',$id)
            ->orderBy('options_values.option_id')
            ->join('options','options_values.option_id','=','options.option_id')
            ->get();
        return $options;
    }
    public static function deletevauel($id)
    {
        return DB::table('options_values')->where('options_values.item_id','=',$id)
            ->delete();
    }


}
