<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\SCategories;
use App\Categories;
use App\SSCategories;
use Toastr;

class SSCategoriesController extends Controller
{
    public $settings;
    public $destinationPath = 'img/categories/';

    public function __construct()
    {
        $this->settings = new SettingsController;
        $this->settings = $this->settings->getsettings();
    }

    public function showall()
    {
        $scategory_items=SSCategories::getall();
        //$scategories=SCategories::all();
        $settings = $this->settings;
        return view('home.sscategories.all',[
            'scategory_items'=>$scategory_items,
            'settings'=>$settings
        ]);
    }
    public function showedit($id)
    {
        $sscategory=SSCategories::find($id);
        $categories=Categories::all();
        $scategories=SCategories::all();
        //$category = $id;
        return view('home.modal.sscategories.edit',[
            'sscategory'=>$sscategory,
            'scategories'=>$scategories,
            'categories'=>$categories
        ]);
    }
    public function showadd()
    {
        $categories=Categories::all();
        $scategories=SCategories::all();
        return view('home.modal.sscategories.add',[
            'scategories'=>$scategories,
            'categories'=>$categories
        ]);
    }
    public function add(Request $request)
    {
        $files = Input::file('s_s_category_preview');

        $images = new ImageController;
        $preview = $images->addImages($files,$this->destinationPath);
        $preview = implode(';',$preview);

        $sscategory=new SSCategories;
        $sscategory->s_category_id=$request->s_category_id;
        $sscategory->s_s_category_title=$request->s_s_category_title;
        $sscategory->s_s_category_preview=$preview; //ссылки на картинки
        $sscategory->save(); // Сохраняем все в базу.
        Toastr::success('Под-под категория добавлена.', $title = null, $options = []);
        return back();
    }
    public function edit(Request $request)
    {
        $files = Input::file('s_s_category_preview');
        $images = new ImageController;
        $preview = $images->addImages($files,$this->destinationPath);

        $sscategory=SSCategories::find($request->s_s_category_id);
        $sscategory->s_category_id=$request->s_category_id;
        $sscategory->s_s_category_title=$request->s_s_category_title;
        strlen($sscategory->s_s_category_preview) ? $sscategory->s_s_category_preview=explode(';',$sscategory->s_s_category_preview) : $sscategory->s_s_category_preview=[];
        $sscategory->s_s_category_preview=implode(';',array_merge($sscategory->s_s_category_preview,$preview));
        $sscategory->save(); // Сохраняем все в базу.
        Toastr::success('Под-под категория изменена.', $title = null, $options = []);
        return back();
    }
}
