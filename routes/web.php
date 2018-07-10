<?php
Auth::routes();
Route::get('/logout', 'Auth\LogoutController@index')->name('logout');

// csrfError
Route::get('/csrf-error', function() {
    return "Oops! Seems you couldn't submit form for a long time. Please try again.";
})->name('csrfError');

// multi-langs
Route::post('/admin/language', array(
    'Middleware' => 'LanguageSwitcher',
    'uses' => 'LanguageController@index'
));

/* Website *********************************** */
Route::group(['namespace' => 'Website', 'prefix' => ''], function() {

    Route::get('/', 'HomeController@index');


    /* route 404 for website */
    Route::get('404', function () {
        return 'Hello World';
    })->name('website404');
});

/* Admin *********************************** */
Route::prefix('admin')->group( function() {
    Route::get('/', function() {
        return redirect()->guest( route('admin.dashboard'));
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('/category', 'CategoryController');

    /* route 404 for admin */
    Route::get('404', function () {
        return 'Admin 404';
    })->name('admin404');
});

/* API *********************************** */
Route::group(['namespace' => 'Api', 'prefix' => 'api'], function()
{
    Route::post('/get-category-tree', 'AjaxController@getCategoryTree');
});



