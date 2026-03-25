<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;

// Halaman publik (frontend)
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('/news/{news}', [FrontendController::class, 'newsDetail'])->name('frontend.news.detail');
Route::get('/employee/{employee}', [FrontendController::class, 'employeeDetail'])->name('frontend.employees.detail'); // ✅ DIPERBAIKI
Route::get('/employees', [FrontendController::class, 'allEmployees'])->name('frontend.employees.all');
Route::get('/portofolio', [FrontendController::class, 'portofolio'])->name('frontend.portofolio');
Route::get('/news', [FrontendController::class, 'allNews'])->name('frontend.news');
// Tambahkan ini di bawah route lainnya
Route::get('/portofolio', [FrontendController::class, 'portofolio'])->name('frontend.portofolio');
Route::get('/news', [FrontendController::class, 'allNews'])->name('frontend.news');
// Tambahkan ini
Route::get('/news', [FrontendController::class, 'allNews'])->name('frontend.news');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // ... route lainnya

    Route::get('/portofolio', [App\Http\Controllers\PortofolioController::class, 'index'])
         ->name('admin.portofolio');

    Route::get('/portofolio/create', [App\Http\Controllers\PortofolioController::class, 'create'])
         ->name('admin.portofolio.create');

    Route::post('/portofolio', [App\Http\Controllers\PortofolioController::class, 'store'])
         ->name('admin.portofolio.store');

    Route::get('/portofolio/{portofolio}', [App\Http\Controllers\PortofolioController::class, 'show'])
         ->name('admin.portofolio.show');

    Route::get('/portofolio/{portofolio}/edit', [App\Http\Controllers\PortofolioController::class, 'edit'])
         ->name('admin.portofolio.edit');

    Route::put('/portofolio/{portofolio}', [App\Http\Controllers\PortofolioController::class, 'update'])
         ->name('admin.portofolio.update');

    Route::delete('/portofolio/{portofolio}', [App\Http\Controllers\PortofolioController::class, 'destroy'])
         ->name('admin.portofolio.destroy');
});

// Halaman Daftar Portofolio Frontend
Route::get('/portofolio', function () {
    $portofolios = \App\Models\Portofolio::orderBy('created_at', 'desc')->get();
    return view('frontend.portofolio', compact('portofolios'));
})->name('frontend.portofolio');
Route::get('/portofolio/{id}', function ($id) {
    $portofolio = \App\Models\Portofolio::findOrFail($id);
    return view('frontend.portofolio.show', compact('portofolio'));
})->name('frontend.portofolio.show');

// Auth routes
Auth::routes();

// Halaman home (setelah login)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Grup admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('company-profiles', CompanyProfileController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('news', NewsController::class);
});

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

Route::get('/lang/id', function () {
    session(['locale' => 'id']);
    return redirect()->back();
})->name('lang.id');

// Ganti bahasa
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');







