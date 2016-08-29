<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SSCategories extends Model
{
    protected $primaryKey = 's_s_category_id';


    public static function getall()
    {
        $sscategory_id = DB::table('s_s_categories')
            ->join('s_categories','s_s_categories.s_category_id','=','s_categories.s_category_id')
            ->join('categories','s_categories.category_id','=','categories.category_id')
            ->get();
        return $sscategory_id;
    }
    public static function findparent($category_id,$s_category_id)
    {
        return DB::table('s_s_categories')
            ->where('s_s_categories.category_id',$category_id)
            ->where('s_s_categories.s_category_id',$s_category_id)
            ->join('s_categories','s_s_categories.s_category_id','=','s_categories.s_category_id')
            ->get();
    }
}
