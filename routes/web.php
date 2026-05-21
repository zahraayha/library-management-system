<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;
use App\Models\Category;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : view('auth.login');
});

$dashboardData = fn () => [
        'bookCount' => Book::count(),
        'categoryCount' => Category::count(),
        'latestBooks' => Book::with('category')->latest()->take(5)->get(),
        'categoryStats' => Category::withCount('books')->orderByDesc('books_count')->take(4)->get(),
];

Route::get('/dashboard', function () use ($dashboardData) {
    return view('dashboard', $dashboardData());
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->group(function () use ($dashboardData) {

    Route::get('/dashboard-admin', function () use ($dashboardData) {
        return view('dashboard', $dashboardData());
    })->name('dashboard.admin');

    Route::resource('books', BookController::class);

});
