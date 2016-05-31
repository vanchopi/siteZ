<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Options;

class OptionsController extends Controller
{
    public function showadd()
    {

        return view('home.modal.options.add');
    }
    public function save(Request $request)
    {
        $option=new Options; //записываем параметр и единицу измерения в базу
        $option->option_title = $request->title;
        $option->option_unit = $request->unit;
        $option->save();
        return [$option->option_id,$option->option_title,$option->option_unit]; //возвращаем массив из id созданого параметра и название параметра
    }

}
