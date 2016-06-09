<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;

class BasketController extends Controller
{



    public function index()
    {
        $allcategories = Categories::all();


        if(isset($_COOKIE['basket'])) // проверяем, есть ли заказы
        {
            $orders = $_COOKIE['basket'];
            $orders=json_decode($orders); //перекодируем строку из куки в массив с объектами
        }
        else
        {
            $orders=[];
        }
        $total = 0;
        foreach ($orders as $order) {
            $total += $order->price*$order->amount;
        }
        return view('basket',[
            'allcategories'=>$allcategories,
            'orders'=>$orders,
            'total'=>$total

        ]);

    }
    function clear()
    {
        if(isset($_COOKIE['basket'])) {
            setcookie('basket',''); //удаляем куки
        }
        return back();
    }
}
