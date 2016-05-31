<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Items;


/*
Route::get('/', function () {
    return view('index');
});
*/

Route::get('/',           ['uses' => 'ItemsController@index',           'as' => 'site.items.index']);

Route::get('/good/{id}',           ['uses' => 'ItemsController@one',           'as' => 'site.items.one']);


Route::get('/category/{id}',           ['uses' => 'ItemsController@category',           'as' => 'site.items.category']);

Route::get('/category/{id}/{s_category_id}',           ['uses' => 'ItemsController@scategory',           'as' => 'site.items.scategory']);


Route::get('/category/{id}/{s_category_id}/{s_s_category_id}',           ['uses' => 'ItemsController@all',           'as' => 'site.items.all']);


/*
Route::get('/clubs/', function () {
    return view('clubs');
});
*/
/*
Route::get('/good/', function () {
    return view('good');
});
*/
Route::get('/basket/', function () {
    return view('basket');
});
Route::get('/order/', function () {
    return view('order');
});
Route::get('/n-teams/', function () {
    return view('n-teams');
});

Route::get('/item/', function () {
    return view('item');
});


//Route::get('/home', 'HomeController@index');



Route::auth();

/* ------------ Админ-страницы ------------ */
Route::group(['prefix' => 'home','middleware' => ['web']], function() {

    Route::auth();

    Route::get('settings/home',           ['uses' => 'SettingsController@home',           'as' => 'settings.home']);
    Route::get('settings/site',           ['uses' => 'SettingsController@site',           'as' => 'settings.site']);
    Route::post('settings/home',           ['uses' => 'SettingsController@savehome',           'as' => 'settings.save.home']);
    Route::post('settings/site',           ['uses' => 'SettingsController@savesite',           'as' => 'settings.save.site']);


    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
    /*
    Route::get('/aou', ['as' => 'index', function () {

        $items = Items::all();
        $collection = collect(['product_id' => 1, 'name' => 'Desk', 'price' => 100, 'discount' => false]);

        return view('home.index',[
            'items'=>$items,
            'collection'=>$collection
        ]);
    }]);
    */

    /* ------------ Магазин ------------ */
    /* ------------ Магазин ------------ */
    /* ------------ Магазин ------------ */
    Route::get('shopallitems',           ['uses' => 'ItemsController@showall',           'as' => 'shopallitems']);

    Route::get('shopallitems/{page}',           ['uses' => 'ItemsController@showallwithpage',           'as' => 'shopallitems.page']);

    Route::get('shopadditem',           ['uses' => 'ItemsController@showadd',           'as' => 'shopadditem']);


    Route::post('additem',            ['uses' => 'ItemsController@add',                'as' => 'item.add']);
    Route::post('edititem',            ['uses' => 'ItemsController@edit',                'as' => 'item.edit']);
    Route::get('item/{id}/edit',            ['uses' => 'ItemsController@showeditonwindow',                'as' => 'item.showeditid']);


    Route::post('item/{id}/deleteimage',            ['uses' => 'ItemsController@deleteimage',                'as' => 'item.deleteimage']);
    Route::post('deleteimage',            ['uses' => 'ItemsController@deleteimage',                'as' => 'item.deletemodalimage']);
    Route::post('item/{id}/edit',            ['uses' => 'ItemsController@showedit',                'as' => 'item.showedit']);
    Route::post('item/{id}/delete',            ['uses' => 'ItemsController@delete',                'as' => 'item.del']);

    /*
     Категории товаров
    */
    Route::get('allcategories',           ['uses' => 'CategoriesController@showall',           'as' => 'allcategories']);

    Route::post('addcategory',            ['uses' => 'CategoriesController@add',                'as' => 'category.add']);
    Route::post('editcategory',            ['uses' => 'CategoriesController@edit',                'as' => 'category.edit']);

    Route::post('category/{id}',            ['uses' => 'CategoriesController@showedit',                'as' => 'category.showedit']);
    Route::post('addcategorymodal',            ['uses' => 'CategoriesController@showadd',                'as' => 'category.showadd']);

    /*
     Под-категории товаров
    */
    Route::get('allscategories',           ['uses' => 'SCategoriesController@showall',           'as' => 'allscategories']);

    Route::post('addscategory',            ['uses' => 'SCategoriesController@add',                'as' => 'scategory.add']);
    Route::post('editscategory',            ['uses' => 'SCategoriesController@edit',                'as' => 'scategory.edit']);

    Route::post('scategory/{id}',            ['uses' => 'SCategoriesController@showedit',                'as' => 'scategory.showedit']);
    Route::post('addscategorymodal',            ['uses' => 'SCategoriesController@showadd',                'as' => 'scategory.showadd']);

    Route::post('allscategories/deleteimage',            ['uses' => 'SCategoriesController@deleteimage',                'as' => 'scategory.deleteimage']);

    /*
     Под-под-категории товаров
    */
    Route::get('allsscategories',           ['uses' => 'SSCategoriesController@showall',           'as' => 'allsscategories']);

    Route::post('addsscategory',            ['uses' => 'SSCategoriesController@add',                'as' => 'sscategory.add']);
    Route::post('editsscategory',            ['uses' => 'SSCategoriesController@edit',                'as' => 'sscategory.edit']);

    Route::post('sscategory/{id}',            ['uses' => 'SSCategoriesController@showedit',                'as' => 'sscategory.showedit']);
    Route::post('addsscategorymodal',            ['uses' => 'SSCategoriesController@showadd',                'as' => 'sscategory.showadd']);

    Route::get('categories/clubs',           ['uses' => 'SSCategoriesController@clubs',           'as' => 'categories.clubs']);



    Route::post('/item/{id}',            ['uses' => 'ItemsController@showedit',                'as' => 'item.edit']);

    Route::post('edititem', 'ItemsController@edit');



    /* ------------ Заказы ------------ */
    /* ------------ Заказы ------------ */
    /* ------------ Заказы ------------ */
    Route::get('ordersall',           ['uses' => 'OrdersController@index',           'as' => 'ordersall']);

    Route::get('ordersphone',           ['uses' => 'OrdersController@phoneall',           'as' => 'ordersphone']);
    Route::get('ordersphoneusers',           ['uses' => 'OrdersController@phoneusers',           'as' => 'ordersphoneusers']);

    Route::post('orderadd',           ['uses' => 'OrdersController@add',           'as' => 'ordersadd']);
    Route::post('changestatus',           ['uses' => 'OrdersController@changestatus',           'as' => 'changestatus']);
    Route::post('phone/{id}/delete',            ['uses' => 'OrdersController@phonedelete',                'as' => 'phone.del']);

    Route::post('changephonestatus',           ['uses' => 'OrdersController@changephonestatus',           'as' => 'changephonestatus']);
    Route::post('order/{id}/show',        ['uses' => 'OrdersController@show',           'as' => 'order.show']);

    Route::post('check/{id}/show',        ['uses' => 'ChecksController@show',           'as' => 'check.show']);

    Route::get('check/{id}/show',        ['uses' => 'ChecksController@showonwindow',           'as' => 'check.showonwindow']);


    /* ------------ Комментарии ------------ */
    /* ------------ Комментарии ------------ */
    /* ------------ Комментарии ------------ */
    Route::get('comments/news',           ['uses' => 'CommentsController@shownews',           'as' => 'comments.news']);
    Route::get('comments/items',           ['uses' => 'CommentsController@showitems',           'as' => 'comments.items']);

    Route::post('comments/{id}',        ['uses' => 'CommentsController@show',           'as' => 'comment.show']);

    /*
    Route::get('comments/news', ['as' => 'comments.news', function () {
        return view('home.comments');
    }]);
    Route::get('comments/items', ['as' => 'comments.items', function () {
        return view('home.comments');
    }]);
    */



    Route::post('uploadimage',          ['uses' => 'ItemsController@addimage',                'as' => 'uploadimage']);


    Route::post('saveoption',            ['uses' => 'OptionsController@save',                'as' => 'option.save']);
    Route::post('addoption',            ['uses' => 'OptionsController@showadd',                'as' => 'option.add']);

    /* ------------ Контакты ------------ */
    /* ------------ Контакты ------------ */
    /* ------------ Контакты ------------ */
    Route::get('infocontacts',              ['uses' => 'ContactsController@showall',            'as' => 'infocontacts.showall']);
    Route::post('contactadd',               ['uses' => 'ContactsController@showadd',            'as' => 'infocontacts.showadd']);
    Route::post('addcontact',               ['uses' => 'ContactsController@add',                'as' => 'infocontacts.add']);
    Route::post('contact/{id}/edit',        ['uses' => 'ContactsController@showedit',           'as' => 'infocontacts.showedit']);
    Route::put('editcontact',              ['uses' => 'ContactsController@edit',               'as' => 'infocontacts.edit']);
    Route::post('contact/{id}/delete',      ['uses' => 'ContactsController@delete',             'as' => 'infocontacts.delete']);




    Route::get('infoabout', ['as' => 'infoabout', function () {
        return view('home.infoabout');
    }]);
});


/* ------------ Пользовательские ------------ */

/*
Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('contacts',           ['uses' => 'ContactsController@index',           'as' => 'contacts']);
    Route::get('confirm/{email}',           ['uses' => 'Auth\AuthController@confirm',           'as' => 'confirm']);

    Route::post('sendmail',           ['uses' => 'MailController@sendmail',           'as' => 'sendmail']);



    Route::post('sendphone',           ['uses' => 'OrdersController@sendphone',           'as' => 'sendphone']);


    //Route::get('/','GamesController@index');
    //Route::get('/','MainController@index'); --- пример
    //Route::post('next','HomeController@next');


    Route::get('news',           ['uses' => 'NewsController@newsevents',           'as' => 'page']);

    Route::get('onenews/{id}',           ['uses' => 'NewsController@one',           'as' => 'onenews']);


    Route::get('events', ['as' => 'events', function () {
        return view('events');
    }]);

    Route::get('/allnews',           ['uses' => 'NewsController@all',           'as' => 'news']);

    Route::get('/news/{category}',           ['uses' => 'NewsController@allcategory',           'as' => 'news.category']);
    Route::get('/news/{category}/{page}',           ['uses' => 'NewsController@allcategory',           'as' => 'news.category.page']);

    Route::get('news/{page}',           ['uses' => 'NewsController@allpage',           'as' => 'news.page']);

    Route::get('news/tag/{tag}',           ['uses' => 'NewsController@searchtag',           'as' => 'news.tag']);


    Route::get('shop', ['as' => 'shop', function () {
        return view('shop');
    }]);
    Route::get('shopitems', ['as' => 'shopitems', function () {
        return view('shopitems');
    }]);



    /*
    Route::get('shoponeitem', ['as' => 'shoponeitem', function () {
        return view('shoponeitem');
    }]);
    */
/*
    Route::get('/',           ['uses' => 'ItemsController@one',           'as' => 'shoponeitem']);




    Route::get('check',           ['uses' => 'OrdersController@create',           'as' => 'check']);



    Route::post('comment/items',          ['uses' => 'CommentsController@items',                'as' => 'comment.items']);
    Route::post('comment/news',          ['uses' => 'CommentsController@news',                'as' => 'comment.news']);

    Route::post('basket', ['as' => 'basket', function () {
        return view('modal.basket');
    }]);





});

*/


