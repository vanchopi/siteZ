<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contacts;
use App\Http\Controllers\SettingsController;
use Mail;
use Auth;

class ContactsController extends Controller
{
    public $settings;
    public $sitesettings;

    public function __construct()
    {
        $settings = new SettingsController;
        $this->settings = $settings->getsettings();
        $this->sitesettings = $settings->getsitesettings();
    }


    public function index()
    {
        $img = asset('/images/iceVchRmz00.jpg');
        Mail::send('emails.order', ['img' => $img], function ($message) {
            $message->from('dposkachei@gmail.com', 'Not simple test');

            $message->to('dposkachei@gmail.com')->cc('bar@example.com');
        });

        $contacts = Contacts::all();
        return view('contacts',[
            'phone'=>$this->sitesettings->phone_first,
            'contacts'=>$contacts
        ]);
    }










    public function showall()
    {
        $settings = $this->settings;
        $contacts = Contacts::all();
        return view('home.contacts.all',[
            'contacts'=>$contacts,
            'settings'=>$settings
        ]);
    }
    public function showedit($id)
    {
        $contact = Contacts::find($id);
        return view('home.modal.contacts.edit',[
            'contact'=>$contact
        ]);
    }
    public function showadd()
    {
        return view('home.modal.contacts.add');
    }
    public function add(Request $request)
    {
        $contacts= new Contacts;
        $contacts->title=$request->title;
        $contacts->login=$request->login;
        $contacts->url=$request->url;
        $contacts->save();
        session(['message' => 'Контакт добавлен']);
        //session()->flash('message', '');
        return back();
    }
    public function edit(Request $request)
    {
        $contacts=Contacts::find($request->id);
        $contacts->title=$request->title;
        $contacts->login=$request->login;
        $contacts->url=$request->url;
        $contacts->save();
        session(['message' => 'Контакт изменен']);
        return back();
    }
    public function delete($id)
    {
        Contacts::destroy($id);
        //$contacts=Contacts::where('contacts.id','=',$id);
        //$contacts->delete();
        return 'OK';
    }
}
