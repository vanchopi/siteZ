<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SCategories extends Model
{
    protected $primaryKey = 's_category_id';


    public static function getall()
    {
        return DB::table('s_categories')
            ->join('categories','categories.category_id','=','s_categories.category_id')
            ->get();
    }
    public static function findparent($id)
    {
        return DB::table('s_categories')->where('s_categories.category_id',$id)
            ->join('categories','s_categories.category_id','=','categories.category_id')
            ->get();
    }
    public static function findchildren($collection)
    {
        return DB::table('s_s_categories')->whereIn('s_s_categories.s_category_id', $collection)
            ->orderBy('s_s_categories.s_category_id')
            //->join('s_categories','s_s_categories.s_category_id','=','s_categories.s_category_id')
            ->get();

    }
    public static function categoryforkey($collection)
    {
        $query = DB::table('s_categories')->whereIn('s_categories.s_category_id', $collection)
            ->orderBy('s_categories.s_category_id')
            ->get();
        $categories = [];
        foreach($query as $item) {
            $categories[$item->s_category_id]['s_category_id'] = $item->s_category_id;
            $categories[$item->s_category_id]['s_category_title'] = $item->s_category_title;
        }
        return $categories;

    }

}
