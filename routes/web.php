<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\InvoiceDetailController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (Request $request) {
    $ListProducts = null;
    if ($request->has('keyword') == true){
        $keyword = $request->get('keyword');
        $ListProducts = Product::where('name', 'LIKE', "%$keyword%")->get();
    } else{
        $ListProducts = Product::paginate(8);
    }
    
    return view('/index', [
        'data' => $ListProducts,
    ],
    
);
})->name('index');

Route::get('xem-them', function(Request $request) {
    $ListProducts = null;
    if ($request->has('keyword') == true){
        $keyword = $request->get('keyword');
        $ListProducts = Product::where('name', 'LIKE', "%$keyword%")->get();
    } else{
        $ListProducts = Product::paginate(12);
    }
    
    return view('/index', [
        'data' => $ListProducts,
    ],
    
);
})->name('xem-them');

Route::get('profile/{id}', 'Admin\ProfileController@view')->name('user-profile');
Route::get('profile-invoice/{id}', 'Admin\ProfileController@user_invoice')->name('profile-invoice');
Route::get('login', 'Auth\LoginController@getLoginForm')->name('auth.getLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::get('checkout', 'Check\CheckoutController@form')->name('checkout');
Route::post('store', 'Check\CheckoutController@submit_form')->name('store-checkout');

Route::post('invoice-delete/{id}', 'Admin\InvoiceDetailController@delete_invoice')->name('invoice-delete');
// Route::get('/ctproduct{product)', function(Product $product) {
//     return view('/ctproduct', [
//         'data' => $product,
//     ]);
// });
// Route::get('/ctproduct', function () {
//     return view('/ctproduct');
// })->name('/ctproduct');

Route::post('add-comment/{id}', 'Admin\CommentController@add_comment')->name('add-comment');

Route::post('remove-comment/{id}', 'Admin\CommentController@remove_comment')->name('remove-comment');

Route::get('ctproduct/{product}', 'Admin\ProductController@home')->name('ctproduct');
Route::get('san-pham/{category}', 'Admin\ProductController@products')->name('product.detail');


Route::get('/welcome', function () {
})->name('/welcome');

Route::get('/home', function () {
    return view('/home');
})->name('/home');

// Route::get('login', 'Admin\LoginController@login')->name('login');
// Route::post('login', 'Admin\LoginController@store')->name('login');

Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group([
    'middleware' => ['check_login']
], function(){
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
    ], function () {
        Route::group([
            'prefix' => 'users',
            'as' => 'users.',
            'middleware' => [ 'check_admin' ],
        ], function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('create', 'UserController@create')->name('create');
            Route::post('store', 'UserController@store')->name('store');
            Route::get('edit/{user}', 'UserController@edit')->name('edit');
            Route::post('update/{user}', 'UserController@update')->name('update');
            Route::post('delete/{user}', 'UserController@delete')->name('delete');
            Route::get('/{user}', 'UserController@show')->name('show');
        });
        Route::group([
            'prefix' => 'products',
            'as' => 'products.',
            'middleware' => [ 'check_admin' ],
        ], function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('create', 'ProductController@create')->name('create');
            Route::post('store', 'ProductController@store')->name('store');
            Route::get('edit/{product}', 'ProductController@edit')->name('edit');
            Route::post('update/{product}', 'ProductController@update')->name('update');
            Route::post('delete/{product}', 'ProductController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'categories',
            'as' => 'categories.',
            'middleware' => [ 'check_admin' ],
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
            Route::post('update/{id}', 'CategoryController@update')->name('update');
            Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'invoices',
            'as' => 'invoices.',
            'middleware' => [ 'check_admin' ],
        ], function(){
            Route::get('/', 'InvoiceController@index')->name('index');
            Route::get('edit/{invoice}', 'InvoiceController@edit')->name('edit');
            Route::post('update/{invoice}', 'InvoiceController@update')->name('update');
            Route::post('delete/{invoice}', 'InvoiceController@delete')->name('delete');
            Route::get('ct-invoice/{invoice}', 'InvoiceController@ct_invoice' )->name('ct-invoice');
        });
        Route::group([
            'prefix' => 'invoice_details',
            'as' => 'invoice_details.',
            'middleware' => [ 'check_admin' ],
        ], function(){
            Route::get('/', 'InvoiceDetailController@index')->name('index');
            Route::get('edit/{id}', 'InvoiceDetailController@edit')->name('edit');
            Route::post('update/{id}', 'InvoiceDetailController@update')->name('update');
            Route::post('delete/{id}', 'InvoiceDetailController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'sliders',
            'as' => 'sliders.',
            'middleware' => [ 'check_admin' ],
        ], function () {
            Route::get('/', 'SliderController@index')->name('index');
            Route::get('create', 'SliderController@create')->name('create');
            Route::post('store', 'SliderController@store')->name('store');
            Route::get('edit/{slider}', 'SliderController@edit')->name('edit');
            Route::post('update/{slider}', 'SliderController@update')->name('update');
            Route::post('delete/{slider}', 'SliderController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'comments',
            'as' => 'comments.',
            'middleware' => [ 'check_admin' ],
        ], function() {
            Route::get('/', 'CommentController@index')->name('index');
            Route::get('ct_comment/{comment}', 'CommentController@getComment')->name('ct_comment');
        });
    });
});
Route::get('cart', 'Cart\CartController@view')->name('cart');
Route::get('add-to-cart/{cart}', 'Cart\CartController@addToCart')->name('add-to-cart');
Route::get('update-cart', 'Cart\CartController@update')->name('update-cart');
Route::get('remove-from-cart/{id}', 'Cart\CartController@remove')->name('remove-cart');
Route::get('dang_ky', 'Admin\UserController@view')->name('dang_ky');
Route::post('register', 'Admin\UserController@register')->name('register');
// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.',
//     'namespace' => 'Admin',
// ], function () {
//     Route::group([
//         'prefix' => 'users',
//         'as' => 'users.',
//         'middleware' => [ 'check_admin' ],
//     ], function () {
//         Route::get('/', 'UserController@index')->name('index');
//         Route::get('create', 'UserController@create')->name('create');
//         Route::post('store', 'UserController@store')->name('store');
//         Route::get('edit/{user}', 'UserController@edit')->name('edit');
//         Route::post('update/{user}', 'UserController@update')->name('update');
//         Route::post('delete/{user}', 'UserController@delete')->name('delete');
//         Route::get('/{user}', 'UserController@show')->name('show');
//     });
//     Route::group([
//         'prefix' => 'products',
//         'as' => 'products.',
//     ], function () {
//         Route::get('/', 'ProductController@index')->name('index');
//         Route::get('create', 'ProductController@create')->name('create');
//         Route::post('store', 'ProductController@store')->name('store');
//         Route::get('edit/{product}', 'ProductController@edit')->name('edit');
//         Route::post('update/{product}', 'ProductController@update')->name('update');
//         Route::post('delete/{product}', 'ProductController@delete')->name('delete');
//     });
//     Route::group([
//         'prefix' => 'categories',
//         'as' => 'categories.',
//     ], function () {
//         Route::get('/', 'CategoryController@index')->name('index');
//         Route::get('create', 'CategoryController@create')->name('create');
//         Route::post('store', 'CategoryController@store')->name('store');
//         Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
//         Route::post('update/{id}', 'CategoryController@update')->name('update');
//         Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
//     });
//     Route::group([
//         'prefix' => 'invoices',
//         'as' => 'invoices.',
//     ], function(){
//         Route::get('/', 'InvoiceController@index')->name('index');
//         Route::get('edit/{invoice}', 'InvoiceController@edit')->name('edit');
//         Route::post('update/{invoice}', 'InvoiceController@update')->name('update');
//         Route::post('delete/{invoice}', 'InvoiceController@delete')->name('delete');
//     });
//     Route::group([
//         'prefix' => 'invoice_details',
//         'as' => 'invoice_details.',
//     ], function(){
//         Route::get('/', 'InvoiceDetailController@index')->name('index');
//     });
//     Route::group([
//         'prefix' => 'sliders',
//         'as' => 'sliders.',
//     ], function () {
//         Route::get('/', 'SliderController@index')->name('index');
//         Route::get('create', 'SliderController@create')->name('create');
//         Route::post('store', 'SliderController@store')->name('store');
//         Route::get('edit/{slider}', 'SliderController@edit')->name('edit');
//         Route::post('update/{slider}', 'SliderController@update')->name('update');
//         Route::post('delete/{slider}', 'SliderController@delete')->name('delete');
//     });
//     Route::group([
//         'prefix' => 'comments',
//         'as' => 'comments.',
//     ], function() {
//         Route::get('/', 'CommentController@index')->name('index');
//         Route::get('ct_comment/{comment}', 'CommentController@getComment')->name('ct_comment');
//     });
// });
Route::get('comment_viw/{product}', 'Admin\CommentController@commentCt')->name('comment_viw');
//end users



//end products
