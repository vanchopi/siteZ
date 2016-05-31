<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\SCategories;
use App\Categories;
class SCategoriesController extends Controller
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
        $scategory_items=SCategories::getall();
        $settings = $this->settings;
        return view('home.scategories.all',[
            'scategory_items'=>$scategory_items,
            'settings'=>$settings
        ]);
    }
    public function showedit($id)
    {
        $scategory=SCategories::find($id);
        $categories=Categories::all();
        //$category = $id;
        return view('home.modal.scategories.edit',[
            'scategory'=>$scategory,
            'categories'=>$categories
        ]);
    }
    public function showadd()
    {
        $categories=Categories::all();
        return view('home.modal.scategories.add',[
            'categories'=>$categories
        ]);
    }
    public function add(Request $request)
    {
        $files = Input::file('s_category_preview');

        $images = new ImageController;
        $preview = $images->addImages($files,$this->destinationPath);
        $preview = implode(';',$preview);

        $scategory=new SCategories;
        $scategory->category_id=$request->category_id;
        $scategory->s_category_title=$request->s_category_title;
        $scategory->s_category_preview=$preview; //ссылки на картинки
        $scategory->save(); // Сохраняем все в базу.
        session(['message' => 'Под-категория добавлена']);
        return back();
    }
    public function edit(Request $request)
    {
        $files = Input::file('s_category_preview');
        $images = new ImageController;
        $preview = $images->addImages($files,$this->destinationPath);

        $scategory=SCategories::find($request->s_category_id);
        $scategory->category_id=$request->category_id;
        $scategory->s_category_title=$request->s_category_title;
        strlen($scategory->s_category_preview) ? $scategory->s_category_preview=explode(';',$scategory->s_category_preview) : $scategory->s_category_preview=[];
        $scategory->s_category_preview=implode(';',array_merge($scategory->s_category_preview,$preview));

        $scategory->save(); // Сохраняем все в базу.
        session(['message' => 'Под-категория изменена']);
        return back();
    }
    public function deleteimage(Request $request)
    {
        $src=$request->input("src");
        $item_id=$request->input("id");
        $scategory=SCategories::find($item_id);

        $images=explode(";",$scategory->s_category_preview);//преобразуем строку в массив
        $root=$_SERVER['DOCUMENT_ROOT'].'/'.$this->destinationPath; //путь до картинок
        if(($key=array_search($src,$images))>=0) //находим ключ, значение, которого соответствует ссылке на картинку
        {
            unset($images[$key]); //удалем ссылку из массива
            if(file_exists($root.$src)) //проверяем существование файла
            {
                unlink($root.$src); //удаляем файл
            }
        }
        $url=implode(";",$images); //переделываем массив строку
        $scategory->s_category_preview=$url; //обновляем значение в поле preview
        $scategory->save(); //сохраняем изменения

        return "OK";
    }


}
