<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    protected $primaryKey = 'category_id';


    public static function getcountitems()
    {
        $query = [];
        $category_id = DB::table('categories')->get();
//        foreach($category_id as $id) {
//            //$category_id[$id->category_id]->count = '1';
//
//            $query[$id->category_id] = DB::table('items')->where('items.category_id','=',$id->category_id)
//                ->join('categories','categories.category_id','=','items.category_id')
//                ->select('categories.category_title','categories.category_id')->firstOrFail();
//
//            //$query[$id->category_id]->count = DB::table('items')->where('items.category_id','=',$id->category_id)->firstOrFail()->count();
//            // if (empty($query[$id->category_id]->count)) {
//            //     $query[$id->category_id]->count = '0';
//            // }
//        }
        return $category_id;
    }
}
