<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
use Toastr;

class CategoriesController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = new SettingsController;
        $this->settings = $this->settings->getsettings();
    }

    public function showall()
    {
        $category_items=Categories::getcountitems();
        $categories=Categories::all();
        return view('home.categories.all',[
            'categories'=>$categories,
            'category_items'=>$category_items,
            'settings'=>$this->settings
        ]);
    }
    public function showedit($id)
    {
        $category=Categories::find($id);
        //$category = $id;
        return view('home.modal.categories.edit',[
            'category'=>$category
        ]);
    }
    public function showadd()
    {
        return view('home.modal.categories.add');
    }
    public function add(Request $request)
    {
        $category=new Categories;
        $category->category_title=$request->category_title;
        $category->category_url_title=str_slug($request->category_title);
        $category->save(); // Сохраняем все в базу.
        Toastr::success('Категория добавлена.', $title = null, $options = []);
        return back();
    }
    public function edit(Request $request)
    {
        $category=Categories::find($request->category_id);
        $category->category_title=$request->category_title;
        $category->category_url_title=str_slug($request->category_title);
        $category->save(); // Сохраняем все в базу.
        Toastr::success('Категория изменена.', $title = null, $options = []);
        return back();
    }
}
