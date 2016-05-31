<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Orders extends Model
{


    public static function getall()
    {
        $order = DB::table('orders')
            ->join('checks','orders.id','=','checks.order_id')
            ->get();
        return $order;
    }


    public static function getorder($id)
    {
        //$order = DB::table('orders')->where('orders.id','=',$id)->first();

        $order = DB::table('orders')->where('orders.id','=',$id)
            ->join('oc_countries','orders.oc_country_id','=','oc_countries.oc_country_id')
            ->first();

        return $order;
    }
}
