<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminPackagesController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminTestimonialsController;
use App\Http\Controllers\UserPackageEnquiriesController;
use App\Http\Controllers\AdminPackageEnquiriesController;

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

Route::get('/', [PagesController::class, 'homePage'])->name('homePage');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');
Route::get('/packages', [PagesController::class, 'packages'])->name('pages.packages');
Route::post('/packages/enquire', [PagesController::class, 'enquireSinglePackage'])->name('pages.packages.enquire');
Route::get('/packages/{slug}', [PagesController::class, 'singlePackage'])->name('pages.packages.show');
Route::get('/contact', [PagesController::class, 'contact'])->name('pages.contact');
Route::post('/contact', [PagesController::class, 'storeContact'])->name('pages.contact.store');
Route::post('/newsletter', [PagesController::class, 'storeNewsletterSubs'])->name('pages.newsletterSubs.store');

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin == 1) {
        return view('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('admin/contact', [HomeController::class, 'contactEnquires'])->name('admin.contact')->middleware('is_admin');

Route::get('admin/newsletter', [HomeController::class, 'newsletter'])->name('admin.newsletter')->middleware('is_admin');
Route::patch('admin/newsletter/{id}/toggle-status', [HomeController::class, 'toggleEmailSubsStatus'])->name('admin.toggleEmailSubsStatus')->middleware('is_admin');

Route::middleware('is_admin')->name('admin.packages')->prefix('admin/packages')->group(function () {
    Route::get('/', [AdminPackagesController::class, 'index']);
    Route::get('/create', [AdminPackagesController::class, 'create'])->name('.create');
    Route::post('/store', [AdminPackagesController::class, 'store'])->name('.store');
    Route::get('/{id}/edit', [AdminPackagesController::class, 'edit'])->name('.edit');
    Route::patch('/{id}', [AdminPackagesController::class, 'update'])->name('.update');
    Route::delete('/{id}', [AdminPackagesController::class, 'destroy'])->name('.destroy');
});

Route::middleware('is_admin')->name('admin.testimonials')->prefix('admin/testimonials')->group(function () {
    Route::get('/', [AdminTestimonialsController::class, 'index']);
    Route::get('/create', [AdminTestimonialsController::class, 'create'])->name('.create');
    Route::post('/store', [AdminTestimonialsController::class, 'store'])->name('.store');
    Route::get('/{id}/edit', [AdminTestimonialsController::class, 'edit'])->name('.edit');
    Route::patch('/{id}', [AdminTestimonialsController::class, 'update'])->name('.update');
    Route::delete('/{id}', [AdminTestimonialsController::class, 'destroy'])->name('.destroy');
});

Route::middleware('is_admin')->name('admin.categories')->prefix('admin/categories')->group(function () {
    Route::get('/', [AdminCategoriesController::class, 'index']);
    Route::get('/create', [AdminCategoriesController::class, 'create'])->name('.create');
    Route::post('/store', [AdminCategoriesController::class, 'store'])->name('.store');
    Route::get('/{id}/edit', [AdminCategoriesController::class, 'edit'])->name('.edit');
    Route::patch('/{id}', [AdminCategoriesController::class, 'update'])->name('.update');
    Route::delete('/{id}', [AdminCategoriesController::class, 'destroy'])->name('.destroy');
});

Route::middleware('is_admin')->name('admin.packageEnquiries')->prefix('admin/package-enquiries')->group(function () {
    Route::get('/', [AdminPackageEnquiriesController::class, 'index']);
    Route::get('/{id}', [AdminPackageEnquiriesController::class, 'show'])->name('.show');
});

Route::middleware('is_admin')->name('admin.users')->prefix('admin/users')->group(function () {
    Route::get('/', [AdminUsersController::class, 'index']);
    Route::get('/create', [AdminUsersController::class, 'create'])->name('.create');
    Route::post('/create', [AdminUsersController::class, 'store'])->name('.store');
    Route::get('/{id}', [AdminUsersController::class, 'show'])->name('.show');
    Route::get('/{id}/edit', [AdminUsersController::class, 'edit'])->name('.edit');
    Route::patch('/{id}', [AdminUsersController::class, 'update'])->name('.update');
    Route::delete('/{id}', [AdminUsersController::class, 'destroy'])->name('.destroy');
});

Route::middleware('auth')->name('account.settings')->prefix('account-settings')->group(function () {
    Route::get('/', [AccountSettingsController::class, 'edit']);
    Route::patch('/', [AccountSettingsController::class, 'update'])->name('.update');
});

Route::middleware('auth')->name('packageEnquiries')->group(function () {
    Route::get('/package-enquiries', [UserPackageEnquiriesController::class, 'index']);
    Route::get('/package-enquiries/{id}', [UserPackageEnquiriesController::class, 'show'])->name('.show');
});

require __DIR__.'/auth.php';
