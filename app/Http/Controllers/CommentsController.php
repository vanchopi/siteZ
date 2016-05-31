<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Comments;

class CommentsController extends Controller
{
    public $settings;

    public function __construct()
    {
        $settings = new SettingsController;
        $this->settings = $settings->getsettings();
    }

    public function items(Request $request)
    {
        $validation = Validator::make(Input::all(),
            array(
                'author'         => 'required|min:3',
                'email'         => 'required|min:3',
                'text'         => 'required|min:3',
            )
        );
        if($validation->fails()) {
            session(['message' => 'Ошибка']);
            //withInput keep the users info
            return back();
        }
        else {

            $comment=new Comments;
            $comment->author=$request->author;
            $comment->email=$request->email;
            $comment->text=$request->text;
            $comment->item_id=$request->item_id;
            $comment->public = 0;
            $comment->save();
            session(['message' => 'Заказ успешно отправлен']);
            return back();
        }

    }
    public function news(Request $request)
    {
        $validation = Validator::make(Input::all(),
            array(
                'author'         => 'required|min:3',
                'email'         => 'required|min:3',
                'text'         => 'required|min:3',
            )
        );
        if($validation->fails()) {
            session(['message' => 'Ошибка']);
            //withInput keep the users info
            return back();
        }
        else {

            $comment=new Comments;
            $comment->author=$request->author;
            $comment->email=$request->email;
            $comment->text=$request->text;
            $comment->news_id=$request->news_id;
            $comment->public = 0;
            $comment->save();
            session(['message' => 'Заказ успешно отправлен']);
            return back();
        }

    }

    public function show($id)
    {
        $comment = Comments::find($id);
        return view('home.modal.comments.text',[
            'comment'=>$comment
        ]);
    }

    public function showitems()
    {
        $comments = Comments::findItems();
        return view('home.comments.items',[
            'settings'=>$this->settings,
            'comments'=>$comments
        ]);
    }
    public function shownews()
    {
        //$comments = Comments::findItems();
        return view('home.comments.news',[
            'settings'=>$this->settings
        ]);
    }
}
