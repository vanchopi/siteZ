<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Checks extends Model
{
    protected $primaryKey = 'check_id';

    public static function findItems($itemsid) {

        $items = DB::table('items')
            ->whereIn('items.id', $itemsid)
            ->get();
        $query = [];
        foreach($items as $item) {
            $query[$item->id] = DB::table('items')->where('items.id', $item->id)->get();
        }




        /*
        $items = DB::table('items')
            ->whereIn('items.id', $itemsid)
            ->join('options_values','items.id','=','options_values.item_id')
            ->join('options','options_values.option_id','=','options.option_id')
            ->select('items.id','items.preview','items.title','items.price','options.option_title','options_values.value')
            ->get();
        */
        /*
        $items = DB::table('options_values')
            ->whereIn('options_values.id', $optionsid)
            ->join('items','options_values.item_id','=','items.id')
            ->join('options','options_values.option_id','=','options.option_id')
            ->select('items.id','items.preview','items.title','items.price','options.option_title','options_values.value')
            ->get();

        */
        return $query;
    }
    public static function findOptions($optionsid) {

        $options = DB::table('options_values')
            ->whereIn('options_values.id', $optionsid)
            ->join('options','options_values.option_id','=','options.option_id')
            ->select('options.option_title','options_values.value')
            ->get();

        return $options;
    }





}
