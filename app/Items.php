<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Items extends Model
{
    protected $fillable = ['title','category_id','s_category_id','text','preview','price','status'];

    public static function findSSCategory($s_s_category_id)
    {
        return DB::table('items')->where('items.s_s_category_id',$s_s_category_id)->get();

    }
    public static function findSCategory($s_category_id)
    {
        return DB::table('items')->where('items.s_category_id',$s_category_id)->get();

    }
    public static function findCategory($category_id)
    {
        return DB::table('items')->where('items.category_id',$category_id)->get();

    }






    public static function allandcategory($page,$limit)
    {
        $skip = ($page * $limit) - $limit;
        $items = DB::table('items')
            ->join('categories','categories.category_id','=','items.category_id')
            ->select('items.id','items.title','items.price','items.status','categories.category_title')->skip($skip)->take($limit)->get();//->simplePaginate(3);

        return $items;
    }
    public static function countItems($limit) {
        $items = DB::table('items')->count();
        $pages = ceil($items/$limit);
        return $pages;
    }

}
