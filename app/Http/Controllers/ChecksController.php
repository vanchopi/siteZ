<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Checks;
class ChecksController extends Controller
{
    public $settings;

    public function __construct()
    {
        $this->settings = new SettingsController;
        $this->settings = $this->settings->getsitesettings();
    }
















    public function show($id)
    {
        /*
        $check = Checks::find($id);
        $itemsid = explode(';',$check->check_body);
        $items = Checks::findItems($itemsid);
        return view('home.modal.checks.info',[
            'check'=>$check,
            'items'=>$items
        ]);
        */
    }
    public function showonwindow($id)
    {
        $check = Checks::find($id);
        $items = Checks::findItems(explode(';',$check->check_items_id));
        $option = explode(';',$check->check_options_id);

        return view('home.checks.one',[
            'check'=>$check,
            'items'=>$items,
            'option'=>$option
        ]);

    }

}
