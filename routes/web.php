<?php

use Illuminate\Support\Facades\Route;
use App\Models\Brand;
use App\Models\Manual;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Hier registreer je alle web routes voor je applicatie.
| Deze routes worden geladen door de RouteServiceProvider en bevatten
| de "web" middleware group. Maak hier iets moois van!
|
*/

/*
2017-10-30 setup voor urls
Home:           /
Brand:          /52/AEG/
Type:           /52/AEG/53/Superdeluxe/
Manual:         /52/AEG/53/Superdeluxe/8023/manual/
                /52/AEG/456/Testhandle/8023/manual/

Als we later productcategorieën willen toevoegen:
Productcat:     /category/12/Computers/
*/

// Homepage
Route::get('/', function () {
    $brands = Brand::all()->sortBy('name');
    $topmanuals = Manual::orderByDesc('counter')->take(10)->get();
    return view('pages.homepage',['name' => 'Jake, Mohamad, Arda'], compact('brands', 'topmanuals'));
})->name('home', );

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Redirects for manuals
Route::get('/manual/{language}/{brand_slug}/', [RedirectController::class, 'brand']);
Route::get('/manual/{language}/{brand_slug}/brand.html', [RedirectController::class, 'brand']);

// Datafeeds
Route::get('/datafeeds/{brand_slug}.xml', [RedirectController::class, 'datafeed']);

// Locale switch
Route::get('/language/{language_slug}/', [LocaleController::class, 'changeLocale']);

// List of manuals for a brand
Route::get('/{brand_id}/{brand_slug}/', [BrandController::class, 'show']);

// Detail page for a manual
Route::get('/{brand_id}/{brand_slug}/{manual_id}/', [ManualController::class, 'show'])
->name('manual.show');

// Generate sitemaps
Route::get('/generateSitemap/', [SitemapController::class, 'generate']);
