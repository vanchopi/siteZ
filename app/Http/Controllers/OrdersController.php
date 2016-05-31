<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\OcCountries;
use App\Checks;
use App\Phones;

class OrdersController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = new SettingsController;
        $this->settings = $this->settings->getsettings();
    }

    public function create()
    {
        $oc_countries = OcCountries::all();
        return view('check',[
            'oc_countries'=>$oc_countries,
            'settings'=>$this->settings
        ]);
    }



    public function index()
    {
        $oc_countries = OcCountries::all();
        $orders = Orders::getall();
        return view('home.orders.all',[
            'oc_countries'=>$oc_countries,
            'orders'=>$orders,
            'settings'=>$this->settings
        ]);
    }
    public function sendphone(Request $request)
    {
        $phone=new Phones;
        $phone->phone=$request->phone;
        $phone->status=0;
        $phone->save();
        return back();
    }
    public function phoneall()
    {
        $phones = Phones::all();
        $allusers = true;
        return view('home.orders.phone',[
            'phones'=>$phones,
            'settings'=>$this->settings,
            'allusers'=>$allusers
        ]);
    }
    public function phoneusers()
    {
        $phones = Phones::all();
        return view('home.orders.phone',[
            'phones'=>$phones,
            'settings'=>$this->settings
        ]);
    }
    public function phonedelete($id)
    {
        Phones::destroy($id);
        return 'OK';
    }





    public function add(Request $request)
    {
        $validation = Validator::make(Input::all(),
            array(
                'fname'         => 'required|min:3',
                'sname'         => 'required|min:3',
                'lname'         => 'required|min:3',
                'email'         => 'required|min:3',
                'phone'         => 'required',
                'country'       => 'required',
                'oc_country_id' => 'required',
                'address_index' => 'required',
                'address'       => 'required',
            )
        );
        if($validation->fails()) {
            session(['message' => 'Ошибка']);
            //withInput keep the users info
            return back();
        }
        else {

            $order=new Orders;
            $order->fname=$request->fname;
            $order->sname=$request->sname;
            $order->lname=$request->lname;
            $order->email=$request->email;
            $order->phone=$request->phone;
            $order->country=$request->country;
            $order->oc_country_id=$request->oc_country_id;
            $order->address_index=$request->address_index;
            $order->address=$request->address;
            $order->status = '0';
            $order->date = Carbon::now();
            $order->save();

            $check = new Checks;
            $check->order_id = $order->id;
            $check->check_items_id = '3;8';
            $check->check_options_id = 'Размер: 25, Цвет: Белый;Размер: 26, Цвет: Черный';
            $check->check_price = '2500';
            $check->save();
            session(['message' => 'Заказ успешно отправлен']);
            return back();
        }

    }
    public function changestatus(Request $request)
    {
        $order=Orders::find($request->id);
        $order->status=$request->value;
        $order->save();
        return 'OK';
    }
    public function changephonestatus(Request $request)
    {
        $order=Phones::find($request->id);
        $order->status=$request->value;
        $order->save();
        return 'OK';
    }


    public function show($id)
    {
        $order = Orders::getorder($id);
        if($order->country == 0) {
            $order->country = 'Россия';
        }
        return view('home.modal.orders.info',[
            'order'=>$order
        ]);
    }
    public function edit()
    {

    }
}
