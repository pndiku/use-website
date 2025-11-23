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

Route::get('/', 'App\Http\Controllers\PageController@homeNew');
Route::get('/home', 'App\Http\Controllers\PageController@homeNew')->name('home.new');
Route::get('/login', 'App\Http\Controllers\AuthController@login');
Route::get('/register', 'App\Http\Controllers\AuthController@signup');


Route::get('/auth/google', 'App\Http\Controllers\AuthController@redirectToGoogle');
Route::get('/auth/google/callback', 'App\Http\Controllers\AuthController@handleGoogleCallback');


Route::post('/login', 'App\Http\Controllers\AuthController@loginUser')->name('login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout');

Route::post('/subscribe', 'App\Http\Controllers\PageController@subscribe');

Route::get('/manage', 'App\Http\Controllers\PageController@manage')->name('home')->middleware(['auth', 'admin']);

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
Route::get('/use-specialist-market', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('use-specialist-market', compact('siteContent', 'menuItems'));
})->name('use-specialist-market');
Route::get('/next', function () {
    return view('index-next');
})->name('index-next');
Route::get('/securities/equities', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('equities', compact('siteContent', 'menuItems'));
})->name('equities');
Route::get('/securities/bonds', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('bonds', compact('siteContent', 'menuItems'));
})->name('bonds');
Route::get('/securities/{symbol}', 'App\Http\Controllers\SecurityController@showPublic')->name('security.show');
Route::get('/news/{slug}', 'App\Http\Controllers\NewsController@showPublic')->name('news.article');
Route::get('/events/{id}', 'App\Http\Controllers\EventController@showPublic')->name('event.show');
Route::get('/annual-reports', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $reports = \App\Models\AnnualReport::orderBy('published_date', 'desc')->get();
    return view('annual-reports', compact('siteContent', 'menuItems', 'reports'));
})->name('annual-reports');
Route::get('/market-statistics/market-snapshot', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('market-snapshot', compact('siteContent', 'menuItems'));
})->name('market-snapshot');
Route::get('/market-statistics/market-performance', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $reports = \App\Models\MarketPerformance::orderBy('published_date', 'desc')->get();
    return view('market-performance', compact('siteContent', 'menuItems', 'reports'));
})->name('market-performance');
Route::get('/scd/scd-forms', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $forms = \App\Models\ScdForm::orderBy('published_date', 'desc')->get();
    return view('scd-forms', compact('siteContent', 'menuItems', 'forms'));
})->name('scd-forms');
Route::get('/scd/scd-rules', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $rules = \App\Models\ScdRule::orderBy('published_date', 'desc')->get();
    return view('scd-rules', compact('siteContent', 'menuItems', 'rules'));
})->name('scd-rules');
Route::get('/rules-and-regulations/market-regulations', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $regulations = \App\Models\MarketRegulation::orderBy('published_date', 'desc')->get();
    return view('market-regulations', compact('siteContent', 'menuItems', 'regulations'));
})->name('market-regulations');
Route::get('/listed/{stock}', function ($stock) {
    // Convert underscores back to spaces for stock symbols like "AIRTEL UGANDA"
    $stock = str_replace('_', ' ', $stock);

    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();

    // Get related articles for this stock using the ticker
    $security = \App\Models\Security::where('ticker', $stock)
        ->orWhere('company_name', $stock)
        ->first();

    $relatedArticles = collect();
    if ($security) {
        $relatedArticles = $security->news()
            ->published()
            ->latest()
            ->take(6)
            ->get();
    }

    return view('stock-detail', compact('siteContent', 'menuItems', 'stock', 'relatedArticles'));
})->name('stock.detail');

// Proxy endpoint for delayed market data to avoid CORS issues
Route::get('/api/delayed-data', function () {
    $url = "https://scd.use.or.ug/data/delayed.php";

    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_ENCODING, '');

        $response = curl_exec($ch);
        $curlError = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($curlError) {
            return response()->json(['error' => 'CURL error: ' . $curlError], 500);
        }

        if ($httpCode === 200 && $response) {
            $decoded = json_decode($response);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json([
                    'error' => 'Invalid JSON received from API',
                    'json_error' => json_last_error_msg()
                ], 500);
            }

            return response()->json($decoded)
                ->header('Access-Control-Allow-Origin', '*');
        }

        return response()->json(['error' => 'Failed to fetch data', 'http_code' => $httpCode], 500);
    } catch (\Exception $e) {
        \Log::error('Delayed data fetch error: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

// Proxy endpoint for stock data to avoid CORS issues
Route::get('/api/stock-data/{stock}', function ($stock) {
    // Convert underscores back to spaces for stock symbols like "AIRTEL UGANDA"
    $stock = str_replace('_', ' ', $stock);

    $isIndex = in_array($stock, ['ALSI', 'LCI']);

    // URL encode the stock parameter for the API call
    $encodedStock = urlencode($stock);

    if ($isIndex) {
        $url = "https://scd.use.or.ug/data/index.php?index={$encodedStock}";
    } else {
        $url = "https://scd.use.or.ug/data/stock.php?stock={$encodedStock}";
    }

    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_ENCODING, ''); // Handle compression

        $response = curl_exec($ch);
        $curlError = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($curlError) {
            return response()->json(['error' => 'CURL error: ' . $curlError], 500);
        }

        if ($httpCode === 200 && $response) {
            // The API returns data wrapped like this: ([[data]]);
            // We need to strip the outer ( and ); to get [[data]]
            $response = trim($response);

            // Remove leading ( and trailing );
            if (substr($response, 0, 1) === '(') {
                $response = substr($response, 1);
            }
            if (substr($response, -2) === ');') {
                $response = substr($response, 0, -2);
            } elseif (substr($response, -1) === ')') {
                $response = substr($response, 0, -1);
            }

            // Validate JSON
            $decoded = json_decode($response);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json([
                    'error' => 'Invalid JSON received from API',
                    'json_error' => json_last_error_msg(),
                    'first_100' => substr($response, 0, 100),
                    'last_100' => substr($response, -100)
                ], 500);
            }

            return response()->json($decoded)
                ->header('Access-Control-Allow-Origin', '*');
        }

        return response()->json(['error' => 'Failed to fetch data', 'http_code' => $httpCode], 500);
    } catch (\Exception $e) {
        \Log::error('Stock data fetch error: ' . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
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
Route::get('/investors/private-transfers', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $transfers = \App\Models\PrivateTransfer::orderBy('published_date', 'desc')->get();
    return view('private-transfers', compact('siteContent', 'menuItems', 'transfers'));
})->name('private-transfers');
Route::get('/investors/complaints-escalation', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    return view('complaints-escalation', compact('siteContent', 'menuItems'));
})->name('complaints-escalation');
Route::get('/investors/corporate-announcements', function () {
    $siteContent = \App\Models\SiteContent::all()->pluck('value', 'key')->toArray();
    $menuItems = \App\Models\MenuItem::with('activeChildren.activeChildren')
        ->mainMenu()
        ->active()
        ->get();
    $announcements = \App\Models\CorporateAnnouncement::orderBy('published_date', 'desc')->get();
    return view('corporate-announcements', compact('siteContent', 'menuItems', 'announcements'));
})->name('corporate-announcements');
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

// Admin management routes - Protected by auth and admin middleware
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
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
    Route::resource('market-performance', 'App\Http\Controllers\MarketPerformanceController');
    Route::resource('scd-forms', 'App\Http\Controllers\ScdFormController');
    Route::resource('scd-rules', 'App\Http\Controllers\ScdRuleController');
    Route::resource('market-regulations', 'App\Http\Controllers\MarketRegulationController');
    Route::resource('annual-reports', 'App\Http\Controllers\AnnualReportController');
    Route::resource('private-transfers', 'App\Http\Controllers\PrivateTransferController');
    Route::resource('corporate-announcements', 'App\Http\Controllers\CorporateAnnouncementController');
});











