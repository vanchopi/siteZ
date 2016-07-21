<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Items;
use Illuminate\Support\Facades\Input;
use App\Options;
use App\Categories;
use Illuminate\Support\Facades\Validator;
use App\Options_values;
use App\SCategories;
use App\SSCategories;
use App\Http\Controllers\SettingsController;
use App\Comments;
use Toastr;

class ItemsController extends Controller
{
    public $settings;
    public $destinationPath = 'img/items/';

    public function __construct()
    {
        $this->settings = new SettingsController;
        $this->settings = $this->settings->getsettings();
    }


    public function one($title)
    {
        $allcategories = Categories::all();
        $options_values = Options::all();
        $categories = Categories::all();

        $item = Items::where('url_title',$title)->first();
        $option_values = Options::getvalues($item->id);
        $item = Items::findandcategories($item->id);
        //dd($categories);
        $options = collect();
        foreach($option_values as $value) {
            if (!$options->contains($value->option_id)) {
                $options->push($value->option_id);
            }
        }


        return view('good',[
            'allcategories'=>$allcategories,
            'item'=>$item,
            'categories'=>$categories,
            'option_values'=>$option_values,
            'options'=>$options
        ]);
    }
    public function index()
    {
        $allcategories = Categories::all();

        $items = Items::all();
        $categories = Categories::all();
        return view('index',[
            'allcategories'=>$allcategories,
            'categories'=>$categories,
            'items'=>$items
        ]);
    }
    public function all($title, $s_category_title, $s_s_category_title)
    {
        $allcategories = Categories::all();
        $categories = Categories::where('category_url_title',$title)->first();
        $scategories = SCategories::where('s_category_url_title',$s_category_title)->first();
        $sscategories = SSCategories::where('s_s_category_url_title',$s_s_category_title)->first();

        $s_s_category_id = $sscategories->s_s_category_id;

        //$items = Items::all();
        $items = Items::findSSCategory($s_s_category_id);
        //$categories = Categories::all();
        return view('items',[
            'allcategories'=>$allcategories,
            'categories'=>$categories,
            'scategories'=>$scategories,
            'sscategories'=>$sscategories,
            'items'=>$items
        ]);
    }
    public function category($title)
    {
        $allcategories = Categories::all();

        $categories = Categories::where('category_url_title',$title)->first();

        $id = $categories->category_id;
        $scategories_need = SCategories::findparent($id);

        if (empty($scategories_need)) {
            $items = Items::findCategory($id);
            return view('items',[
                'allcategories'=>$allcategories,

                'categories'=>$categories,
                'items'=>$items
            ]);
        }
        else {
            return view('category',[
                'allcategories'=>$allcategories,

                'categories'=>$categories,
                'scategories_need'=>$scategories_need
            ]);
        }
    }
    public function scategory($title, $s_category_title)
    {
        $allcategories = Categories::all();

        $categories = Categories::where('category_url_title',$title)->first();
        $scategories = SCategories::where('s_category_url_title',$s_category_title)->first();

        $s_category_id = $scategories->s_category_id;


        $sscategories_need = SSCategories::findparent($s_category_id);
        if (empty($sscategories_need)) {
            $items = Items::findSCategory($s_category_id);
            return view('items',[
                'allcategories'=>$allcategories,
                'categories'=>$categories,
                'scategories'=>$scategories,
                'items'=>$items
            ]);
        }
        else {
            return view('item',[
                'allcategories'=>$allcategories,

                'categories'=>$categories,
                'scategories'=>$scategories,
                'sscategories_need'=>$sscategories_need
            ]);
        }

    }
























    public function showall()
    {
        $page = 0;
        $this->settings->limit = 100;
        $items = Items::allandcategory($page,$this->settings->limit);
        $settings = $this->settings;
        //$items->setPath('shopallitems/shopallitems');
        return view('home.items.all',[
            'items'=>$items,
            'page'=>$page,
            'settings'=>$settings
        ]);
    }

    public function showallwithpage($page)
    {
        $items = Items::allandcategory($page,$this->settings->limit);
        $navigation = Items::countItems($this->settings->limit);
        $settings = $this->settings;
        //$items->setPath('shopallitems/shopallitems');
        return view('home.shopallitems',[
            'items'=>$items,
            'navigation'=>$navigation,
            'page'=>$page,
            'settings'=>$settings
        ]);
    }
    public function showadd()
    {
        $options = Options::all();
        $categories = Categories::all();
        $scategories = SCategories::all();
        $sscategories = SSCategories::all();
        $settings = $this->settings;
        return view('home.items.add',[
            'options'=>$options,
            'categories'=>$categories,
            'scategories'=>$scategories,
            'sscategories'=>$sscategories,
            'settings'=>$settings
        ]);
    }
    public function showeditonwindow($id)
    {
        $options = Options::all();
        $categories = Categories::all();
        $scategories = SCategories::all();
        $sscategories = SSCategories::all();
        $option_values = Options::getvalues($id);
        $item = Items::find($id);
        $settings = $this->settings;

        return view('home.items.edit',[
            'item'=>$item,
            'options'=>$options,
            'categories'=>$categories,
            'option_values'=>$option_values,
            'scategories'=>$scategories,
            'sscategories'=>$sscategories,
            'settings'=>$settings
        ]);
    }
    public function showedit($id)
    {
        $options = Options::all();
        $categories = Categories::all();
        $option_values = Options::getvalues($id);
        $item = Items::find($id);
        return view('modal.items',[
            'item'=>$item,
            'options'=>$options,
            'categories'=>$categories,
            'option_values'=>$option_values
        ]);
    }



    public function add(Request $request)
    {
        $files = Input::file('preview');

        $images = new ImageController;
        $preview = $images->addImages($files,$this->destinationPath);
        $preview = implode(';',$preview);

        $item=new Items;
        $item->title=$request->title; //название
        $item->url_title=str_slug($request->title);
        $item->category_id=$request->category_id;//описание
        if ($request->s_category_id != '0') {
            $item->s_category_id=$request->s_category_id;//описание
        }
        if ($request->s_s_category_id != '0') {
            $item->s_s_category_id=$request->s_s_category_id;//описание
        }
        $item->text=$request->text;//описание
        $item->price=$request->price; // цена
        $item->status=$request->status;
        $item->preview=$preview; //ссылки на картинки
        $item->save(); // Сохраняем все в базу.
//Обратабываем массивы с параметрами и их значениями.
        if($request->option_id != '') {
            //$out=array_combine($request->option_id,$request->value); // массив будет такой ['5'=>'300'], 5 - это id параметра, 300 - значение пар
        }
//Сохраняем все параметры и значения в базу
        if(empty($request->option_id)) {
            //return back()->with('message','Товар сохранен');
        } //если нет ни одного параметра то просто редиректим обратно.
        else {
            foreach($request->option_id as $key => $value)
            {
                $parameters=new Options_values;
                $parameters->item_id=$item->id;
                $parameters->option_id=$value;
                $parameters->value=$request->value[$key];
                $parameters->save();
            }
        }

        Toastr::success('Товар успешно добавлен.', $title = null, $options = []);
        return back();

    }
    public function edit(Request $request)
    {
        $validation = Validator::make(Input::all(),
            array(
                'title'         => 'required|min:3',
                'text'          => 'required|min:3',
                'price'         => 'required'
            )
        );
        if($validation->fails()) {
            //withInput keep the users info
            Toastr::success('Товар успешно изменен.', $title = null, $options = []);
            return back()->withInput()->withErrors($validation->messages());
        }
        else {
            $files = Input::file('preview');
            $images = new ImageController;
            $preview = $images->addImages($files,$this->destinationPath);

// Сохраняем товар
            $item=Items::find($request->id);
            $item->title=$request->title; //название
            $item->url_title=str_slug($request->title);
            $item->category_id=$request->category_id; //название
            if ($request->s_category_id != '0') {
                $item->s_category_id=$request->s_category_id;
            }
            if ($request->s_s_category_id != '0') {
                $item->s_s_category_id=$request->s_s_category_id;
            }
            $item->text=$request->text;//описание
            $item->price=$request->price; // цена
            $item->status=$request->status; // статус
            strlen($item->preview) ? $item->preview=explode(';',$item->preview) : $item->preview=[]; // если в базе нет ссылок, то возвращаем пустой массив либо поулчаем массив из строк
            $item->preview=implode(';',array_merge($item->preview,$preview));//создаем строку с ссылками;  //ссылки на картинки, добавляем ссылки к существующей строке
            $item->save(); // Сохраняем все в базу.
            Options::deletevauel($request->id);

            if(empty($request->option_id)) {
            } //если нет ни одного параметра то просто редиректим обратно.
            else {
                foreach($request->option_id as $key => $value)
                {
                    $parameters=new Options_values;
                    $parameters->item_id=$item->id;
                    $parameters->option_id=$value;
                    $parameters->value=$request->value[$key];
                    $parameters->save();
                }
            }
            Toastr::success('Товар успешно изменен.', $title = null, $options = []);
            return back();
            //return view('add');
        }

    }
    public function deleteimage(Request $request)
    {
        $src=$request->input("src");
        $item_id=$request->input("id");
        $item=Items::find($item_id);

        $images=explode(";",$item->preview);//преобразуем строку в массив
        $root=$_SERVER['DOCUMENT_ROOT'].'/img/items/'; //путь до картинок
        if(($key=array_search($src,$images))>=0) //находим ключ, значение, которого соответствует ссылке на картинку
        {
            unset($images[$key]); //удалем ссылку из массива
            if(file_exists($root.$src)) //проверяем существование файла
            {
                unlink($root.$src); //удаляем файл
            }
        }
        $url=implode(";",$images); //переделываем массив строку
        $item->preview=$url; //обновляем значение в поле preview
        $item->save(); //сохраняем изменения
        return "OK";
    }
}
