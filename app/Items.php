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
    public static function findandcategories($item_id)
    {
        $query = DB::table('items')->where('items.id',$item_id)->first();

        if ($query->category_id != null) {
            if($query->s_category_id != null) {
                if($query->s_s_category_id != null) {
                    return DB::table('items')->where('items.id',$item_id)
                        ->join('categories','items.category_id','=','categories.category_id')
                        ->join('s_categories','items.s_category_id','=','s_categories.s_category_id')
                        ->join('s_s_categories','items.s_s_category_id','=','s_s_categories.s_s_category_id')
                        //->select('items.*', 'categories.category_title', 's_categories.s_category_title', 's_s_categories.s_s_category_title' )
                        ->first();
                }
                else {
                    return DB::table('items')->where('items.id',$item_id)
                        ->join('categories','items.category_id','=','categories.category_id')
                        ->join('s_categories','items.s_category_id','=','s_categories.s_category_id')
                        //->select('items.*', 'categories.category_title', 's_categories.s_category_title')
                        ->first();
                }
            }
            else {
                return DB::table('items')->where('items.id',$item_id)
                    ->join('categories','items.category_id','=','categories.category_id')
                    //->select('items.*', 'categories.category_title')
                    ->first();
            }
        }

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
