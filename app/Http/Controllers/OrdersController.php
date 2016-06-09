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
use App\Categories;
use Toastr;
use Illuminate\Support\Facades\Session;

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
        $allcategories = Categories::all();


        $oc_countries = OcCountries::all();
        return view('order',[
            'allcategories'=>$allcategories,
            'oc_countries'=>$oc_countries,

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
            Toastr::error('Ошибка.', $title = null, $options = []);
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
            $items_id = [];
            $support_options = [];
            $items_count = [];
            $tshort_num = [];
            $tshort_name = [];
            foreach ($orders as $order) {
                $total += $order->price*$order->amount;
                $items_id[] = $order->item_id;
                $items_count[] = $order->amount;
                if (isset($order->options)) {
                    $support_options[] = $order->options;
                }
                if (isset($order->tshort_num)) {
                    $tshort_num[] = $order->tshort_num;
                    $tshort_name[] = $order->tshort_name;
                }
            }
            $items_id = implode(';',$items_id);
            $items_count = implode(';',$items_count);
            $support_options = implode(';',$support_options);
            $tshort_num = implode(';',$tshort_num);
            $tshort_name = implode(';',$tshort_name);


            $check->check_items_id = $items_id;
            $check->check_items_count = $items_count;
            $check->check_options_id = $support_options;
            $check->check_tshort_num = $tshort_num;
            $check->check_tshort_name = $tshort_name;
            $check->check_price = $total;
            $check->save();

            if(isset($_COOKIE['basket'])) // проверяем, есть ли заказы
            {
                setcookie('basket','', time()-3600, '/siteZ/public');
            }
            Toastr::success('Заказ добавлен', $title = null, $options = []);
            return route('site.items.index');
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
