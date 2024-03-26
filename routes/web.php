<?php
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile-album/{albumId}', [ProfileController::class, 'indexAlbum'])->name('profile.album');
    Route::get('/profile-show/{photoId}',[ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/search', [UserController::class, 'search'])->name('search');
});

Route::middleware('web')->group(function ()
{
    Route::resource('/albums',AlbumController::class);
    Route::resource('/photos',PhotoController::class);
    Route::post('/comments/{photoId}', [CommentController::class, 'store'])->name('profile.comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/photos/{photo}/like', [PhotoController::class, 'like'])->name('photos.like');
    Route::get('/search', [SearchController::class,'search'])->name('search');
    Route::get('/profile/{userId}', [ProfileController::class, 'indexById'])->name('profile.index2');
    Route::get('/albums/{id}', [ProfileController::class,'albumId'])->name('profile.album2');
});

require __DIR__.'/auth.php';
