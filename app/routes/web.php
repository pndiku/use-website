<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PageController@home');
Route::get('/login', 'App\Http\Controllers\AuthController@login');
Route::get('/register', 'App\Http\Controllers\AuthController@signup');


Route::get('/auth/google', 'App\Http\Controllers\AuthController@redirectToGoogle');
Route::get('/auth/google/callback', 'App\Http\Controllers\AuthController@handleGoogleCallback');


Route::post('/login', 'App\Http\Controllers\AuthController@loginUser')->name('login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

Route::post('/subscribe', 'App\Http\Controllers\PageController@subscribe');

Route::get('/manage', 'App\Http\Controllers\PageController@manage')->name('home');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

// File serving routes
Route::get('/uploads/{filename}', function ($filename) {
    $path = base_path('../uploads/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('filename', '.*');

Route::get('/images/{filename}', function ($filename) {
    $path = base_path('../images/' . $filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('filename', '.*');

// Public pages
Route::get('/about', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('about', compact('siteContent', 'menuItems'));
})->name('about');
Route::get('/next', function () {
    return view('index-next');
})->name('index-next');
Route::get('/securities', 'App\Http\Controllers\SecurityController@publicIndex')->name('securities');
Route::get('/securities/{symbol}', 'App\Http\Controllers\SecurityController@showPublic')->name('security.show');
Route::get('/news/{id}', 'App\Http\Controllers\NewsController@showPublic')->name('news.article');
Route::get('/annual-reports', 'App\Http\Controllers\PageController@annualReports')->name('annual-reports');
Route::get('/listings/how-to-list', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('how-to-list', compact('siteContent', 'menuItems'));
})->name('how-to-list');
Route::get('/listings/listing-rules', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('listing-rules', compact('siteContent', 'menuItems'));
})->name('listing-rules');
Route::get('/listings/listing-faqs', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('listing-faqs', compact('siteContent', 'menuItems'));
})->name('listing-faqs');
Route::get('/about/governance/structure', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('governance-structure', compact('siteContent', 'menuItems'));
})->name('governance-structure');
Route::get('/about/products-and-services/international-securities-identification-number-isin', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('isin', compact('siteContent', 'menuItems'));
})->name('isin');
Route::get('/about/trading-participants/custodian-banks', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('custodian-banks', compact('siteContent', 'menuItems'));
})->name('custodian-banks');
Route::get('/about/trading-participants/stock-broker-firms', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('stock-broker-firms', compact('siteContent', 'menuItems'));
})->name('stock-broker-firms');
Route::get('/about/contact-us', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('contact-us', compact('siteContent', 'menuItems'));
})->name('contact-us');
Route::get('/investors/how-to-invest/types-of-investors', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('types-of-investors', compact('siteContent', 'menuItems'));
})->name('types-of-investors');
Route::get('/investors/how-to-invest/kyc-requirements', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('kyc-requirements', compact('siteContent', 'menuItems'));
})->name('kyc-requirements');
Route::get('/investors/investor-faqs', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('investor-faqs', compact('siteContent', 'menuItems'));
})->name('investor-faqs');
Route::get('/scd/about-scd', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('about-scd', compact('siteContent', 'menuItems'));
})->name('about-scd');
Route::get('/scd/services/depository', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('depository-services', compact('siteContent', 'menuItems'));
})->name('depository-services');
Route::get('/scd/services/clearing-and-settlement', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('clearing-settlement-services', compact('siteContent', 'menuItems'));
})->name('clearing-settlement-services');
Route::get('/scd/services/easy-portal', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('easy-portal', compact('siteContent', 'menuItems'));
})->name('easy-portal');
Route::get('/scd/services/registry', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('registry-services', compact('siteContent', 'menuItems'));
})->name('registry-services');

// Admin management routes
Route::prefix('admin')->group(function () {
    Route::resource('news', 'App\Http\Controllers\NewsController');
    Route::resource('events', 'App\Http\Controllers\EventController');
    Route::resource('site-content', 'App\Http\Controllers\SiteContentController');
    Route::put('site-content', 'App\Http\Controllers\SiteContentController@update')->name('site-content.bulk-update');
    Route::resource('carousel-images', 'App\Http\Controllers\CarouselImageController');
    Route::resource('files', 'App\Http\Controllers\FileController');
    Route::resource('menu-items', 'App\Http\Controllers\MenuController');
    Route::get('menu-items-all', 'App\Http\Controllers\MenuController@all')->name('menu-items.all');
    Route::get('menu-parent-options', 'App\Http\Controllers\MenuController@getParentOptions')->name('menu-items.parent-options');
    Route::post('menu-items-reorder', 'App\Http\Controllers\MenuController@reorder')->name('menu-items.reorder');
    Route::resource('securities', 'App\Http\Controllers\SecurityController');
    Route::get('securities-sectors', 'App\Http\Controllers\SecurityController@getSectors')->name('securities.sectors');
    Route::get('market-summary', 'App\Http\Controllers\SecurityController@getMarketSummary')->name('market.summary');
    Route::resource('users', 'App\Http\Controllers\UserController');
});











