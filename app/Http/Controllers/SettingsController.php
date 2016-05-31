<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;

class SettingsController extends Controller
{
    public $file = 'settings.json';
    public $site_file = 'site_settings.json';
    public $settings;
    public $site_settings;

    public function home()
    {
        $settings = $this->getsettings();
        return view('home.settings.home',[
            'settings'=>$settings
        ]);
    }
    public function site()
    {
        $settings = $this->getsettings();
        $site_settings = $this->getsitesettings();
        return view('home.settings.site',[
            'settings'=>$settings,
            'site_settings'=>$site_settings
        ]);
    }
    public function savehome(Request $request)
    {
        $collection = collect([
            'limit' => $request->limit,
            'color' => $request->color,
            'status' => $request->status,
            'push' => $request->push
        ]);
        $exists = Storage::disk('local')->exists('settings.json');
        if ($exists) {
            $collection->toJson();
            Storage::disk('local')->put('settings.json', $collection);
        }
        else {
            $collection->toJson();
            Storage::disk('local')->put('settings.json', $collection);
        }
        session(['message' => 'Настройки изменены']);
        return back();
    }
    public function savesite(Request $request)
    {
        $collection = collect([
            'phone_first' => $request->phone_first,
            'phone_second' => $request->phone_second,
            'email' => $request->email,
            'limit_items' => $request->limit_items,
            'publish_items' => $request->publish_items,
            'check_text' => $request->check_text
        ]);
        $exists = Storage::disk('local')->exists('site_settings.json');
        if ($exists) {
            $collection->toJson();
            Storage::disk('local')->put('site_settings.json', $collection);
        }
        else {
            $collection->toJson();
            Storage::disk('local')->put('site_settings.json', $collection);
        }
        session(['message' => 'Настройки изменены']);
        return back();
    }
    public function getsettings()
    {
        $exists = Storage::disk('local')->exists($this->file);
        if ($exists) {
            $this->settings = Storage::get($this->file);
            $this->settings = json_decode($this->settings);
        }
        return $this->settings;

    }
    public function getsitesettings()
    {
        $exists = Storage::disk('local')->exists($this->site_file);
        if ($exists) {
            $this->site_settings = Storage::get($this->site_file);
            $this->site_settings = json_decode($this->site_settings);
        }
        return $this->site_settings;

    }



}
