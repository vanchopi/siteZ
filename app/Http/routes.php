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

use App\Categories;


Route::get('/',                         ['uses' => 'ItemsController@index',         'as' => 'site.items.index']);
Route::get('/item/{title}',             ['uses' => 'ItemsController@one',           'as' => 'site.items.one']);



/*
    Категории
*/
Route::get('/category/{title}',
    [
        'uses' => 'ItemsController@category',
        'as' => 'site.items.category'
    ]
);
Route::get('/category/{title}/{s_category_title}',
    [
        'uses' => 'ItemsController@scategory',
        'as' => 'site.items.scategory'
    ]
);
Route::get('/category/{title}/{s_category_title}/{s_s_category_title}',
    [
        'uses' => 'ItemsController@all',
        'as' => 'site.items.all'
    ]
);

/*
    Корзина
*/
Route::get('/basket',               ['uses' => 'BasketController@index',           'as' => 'basket']);
Route::get('/basket/clear',         ['uses' => 'BasketController@clear',           'as' => 'basket.clear']);





Route::get('/order',                ['uses' => 'OrdersController@create',           'as' => 'order.create']);
Route::post('orderadd',             ['uses' => 'OrdersController@add',              'as' => 'ordersadd']);
Route::post('basketadd',            ['uses' => 'OrdersController@add',              'as' => 'basketadd']);



Route::get('/n-teams/', function () {
    return view('n-teams');
});

Route::get('/item/', function () {
    return view('item');
});


Route::get('/about/', function () {
    $allcategories = Categories::all();
    return view('about',[
        'allcategories' => $allcategories
    ]);
});

Route::get('/instruction/', function () {
    $allcategories = Categories::all();
    return view('instruction',[
        'allcategories' => $allcategories
    ]);
});

//Route::get('/home', 'HomeController@index');



Route::auth();

/* ------------ Админ-страницы ------------ */
Route::group(['prefix' => 'home','middleware' => ['web']], function() {

    Route::auth();

    Route::get('settings/home',             ['uses' => 'SettingsController@home',               'as' => 'settings.home']);
    Route::get('settings/site',             ['uses' => 'SettingsController@site',               'as' => 'settings.site']);
    Route::get('settings/url',              ['uses' => 'SettingsController@url',                'as' => 'settings.url']);
    Route::post('settings/home',            ['uses' => 'SettingsController@savehome',           'as' => 'settings.save.home']);
    Route::post('settings/site',            ['uses' => 'SettingsController@savesite',           'as' => 'settings.save.site']);


    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);

    /* ------------ Магазин ------------ */
    /* ------------ Магазин ------------ */
    /* ------------ Магазин ------------ */
    Route::get('shopallitems',              ['uses' => 'ItemsController@showall',               'as' => 'shopallitems']);
    Route::get('shopallitems/{page}',       ['uses' => 'ItemsController@showallwithpage',       'as' => 'shopallitems.page']);
    Route::get('shopadditem',               ['uses' => 'ItemsController@showadd',               'as' => 'shopadditem']);


    Route::post('additem',                  ['uses' => 'ItemsController@add',                   'as' => 'item.add']);
    Route::post('edititem',                 ['uses' => 'ItemsController@edit',                  'as' => 'item.edit']);
    Route::get('item/{id}/edit',            ['uses' => 'ItemsController@showeditonwindow',      'as' => 'item.showeditid']);


    Route::post('item/{id}/deleteimage',        ['uses' => 'ItemsController@deleteimage',           'as' => 'item.deleteimage']);
    Route::post('deleteimage',                  ['uses' => 'ItemsController@deleteimage',           'as' => 'item.deletemodalimage']);
    Route::post('item/{id}/edit',               ['uses' => 'ItemsController@showedit',              'as' => 'item.showedit']);
    Route::post('item/{id}/delete',             ['uses' => 'ItemsController@delete',                'as' => 'item.del']);

    /*
     Категории товаров
    */
    Route::get('allcategories',             ['uses' => 'CategoriesController@showall',              'as' => 'allcategories']);
    Route::post('addcategory',              ['uses' => 'CategoriesController@add',                  'as' => 'category.add']);
    Route::post('editcategory',             ['uses' => 'CategoriesController@edit',                 'as' => 'category.edit']);

    Route::post('category/{id}',            ['uses' => 'CategoriesController@showedit',             'as' => 'category.showedit']);
    Route::post('addcategorymodal',         ['uses' => 'CategoriesController@showadd',              'as' => 'category.showadd']);

    /*
     Под-категории товаров
    */
    Route::get('allscategories',                ['uses' => 'SCategoriesController@showall',             'as' => 'allscategories']);

    Route::post('addscategory',                 ['uses' => 'SCategoriesController@add',                 'as' => 'scategory.add']);
    Route::post('editscategory',                ['uses' => 'SCategoriesController@edit',                'as' => 'scategory.edit']);

    Route::post('scategory/{id}',               ['uses' => 'SCategoriesController@showedit',            'as' => 'scategory.showedit']);
    Route::post('addscategorymodal',            ['uses' => 'SCategoriesController@showadd',             'as' => 'scategory.showadd']);

    Route::post('allscategories/deleteimage',   ['uses' => 'SCategoriesController@deleteimage',         'as' => 'scategory.deleteimage']);

    /*
     Под-под-категории товаров
    */
    Route::get('allsscategories',               ['uses' => 'SSCategoriesController@showall',            'as' => 'allsscategories']);

    Route::post('addsscategory',                ['uses' => 'SSCategoriesController@add',                'as' => 'sscategory.add']);
    Route::post('editsscategory',               ['uses' => 'SSCategoriesController@edit',               'as' => 'sscategory.edit']);

    Route::post('sscategory/{id}',              ['uses' => 'SSCategoriesController@showedit',           'as' => 'sscategory.showedit']);
    Route::post('addsscategorymodal',           ['uses' => 'SSCategoriesController@showadd',            'as' => 'sscategory.showadd']);

    Route::get('categories/clubs',              ['uses' => 'SSCategoriesController@clubs',              'as' => 'categories.clubs']);



    Route::post('/item/{id}',            ['uses' => 'ItemsController@showedit',                'as' => 'item.edit']);

    Route::post('edititem', 'ItemsController@edit');



    /* ------------ Заказы ------------ */
    /* ------------ Заказы ------------ */
    /* ------------ Заказы ------------ */
    Route::get('ordersall',                 ['uses' => 'OrdersController@index',                    'as' => 'ordersall']);
    Route::get('ordersphone',               ['uses' => 'OrdersController@phoneall',                 'as' => 'ordersphone']);
    Route::get('ordersphoneusers',          ['uses' => 'OrdersController@phoneusers',               'as' => 'ordersphoneusers']);
    Route::post('changestatus',             ['uses' => 'OrdersController@changestatus',             'as' => 'changestatus']);
    Route::post('phone/{id}/delete',        ['uses' => 'OrdersController@phonedelete',              'as' => 'phone.del']);
    Route::post('changephonestatus',        ['uses' => 'OrdersController@changephonestatus',        'as' => 'changephonestatus']);
    Route::post('order/{id}/show',          ['uses' => 'OrdersController@show',                     'as' => 'order.show']);
    Route::post('check/{id}/show',          ['uses' => 'ChecksController@show',                     'as' => 'check.show']);

    Route::get('check/{id}/show',           ['uses' => 'ChecksController@showonwindow',             'as' => 'check.showonwindow']);


    /* ------------ Комментарии ------------ */
    /* ------------ Комментарии ------------ */
    /* ------------ Комментарии ------------ */
    Route::get('comments/news',         ['uses' => 'CommentsController@shownews',           'as' => 'comments.news']);
    Route::get('comments/items',        ['uses' => 'CommentsController@showitems',          'as' => 'comments.items']);
    Route::post('comments/{id}',        ['uses' => 'CommentsController@show',               'as' => 'comment.show']);


    Route::post('uploadimage',          ['uses' => 'ItemsController@addimage',                  'as' => 'uploadimage']);


    Route::post('saveoption',           ['uses' => 'OptionsController@save',                    'as' => 'option.save']);
    Route::post('addoption',            ['uses' => 'OptionsController@showadd',                 'as' => 'option.add']);

    /* ------------ Контакты ------------ */
    /* ------------ Контакты ------------ */
    /* ------------ Контакты ------------ */
    Route::get('infocontacts',              ['uses' => 'ContactsController@showall',            'as' => 'infocontacts.showall']);
    Route::post('contactadd',               ['uses' => 'ContactsController@showadd',            'as' => 'infocontacts.showadd']);
    Route::post('addcontact',               ['uses' => 'ContactsController@add',                'as' => 'infocontacts.add']);
    Route::post('contact/{id}/edit',        ['uses' => 'ContactsController@showedit',           'as' => 'infocontacts.showedit']);
    Route::put('editcontact',               ['uses' => 'ContactsController@edit',               'as' => 'infocontacts.edit']);
    Route::post('contact/{id}/delete',      ['uses' => 'ContactsController@delete',             'as' => 'infocontacts.delete']);




    Route::get('infoabout', ['as' => 'infoabout', function () {
        return view('home.infoabout');
    }]);
});


