<?php

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Medicament;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name("/") ;

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     $medications= Medicament::all();
//     return Inertia::render('Dashboard',['medications'=>$medications]);
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard',function(){
        $medications= Medicament::all();
        $user=Auth::user()->name;
        $posts=Post::orderByDesc('created_at','desc')->get();
        $link='https://ui-avatars.com/api/?name='.urlencode($user).'&color=7F9CF5&background=EBF4FF';

        return Inertia::render('Dashboard',[
            'medications'=>$medications,
            'posts'=>$posts,
            'link'=>$link
            ]);})->name('dashboard');
    Route::post("/dashboard",[App\Http\Controllers\PostController::class,"store"]) ;
    Route::get('/page',[\App\Http\Controllers\PageController::class,"index"])->name('page'); ;
});


