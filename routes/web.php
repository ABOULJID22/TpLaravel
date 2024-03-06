<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\HelloController;


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



Route::get('/welcome', function () {

    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/routes', [App\Http\Controllers\HomeController::class,'admin'])->middleware('admin');

#route de resource
Route::resource('book',BookController::class);

Route::get('books', [App\Http\Controllers\BookController::class, 'bookshow'])->name('books');
Route::get('/book/detail/{id}', [App\Http\Controllers\BookController::class,'showDetail'])->name('book.showDetail');


Route::get('/',[HelloController::class,'index']);


Route::get('/teams', [TeamController::class, 'index'])->name('teams');




/* Route::get('/exemple-response', function () {
    $content = 'exemple content';
    $headers = ['X-Exemple' => 'custom value'];
    return response($content, 200)->withHeaders($headers);
}); */

Route::get('/exemple-response', function () {
    $datajson =[
        'exemple1' => 'content01',
        'exemple2'=>'content02'
    ] ;
    $headers = ['X-Exemple' => 'custom value'];
    return response()->json($datajson, 200)->withHeaders($headers);
});















/* Route::get('/hello/{nom}', function (Request $request) {
    //dd($request);
    return view('hello', [
        'nom' => $request->nom,
    ]);
}); */


/* Route::get('/example', function (Request $request) {
    // Obtient l'URL complète de la requête (sans les paramètres de la requête)
    $url = $request->url();

    return "L'URL complète est : $url";
});
 */


/*  Route::get('/example', function (Request $request) {
    // Obtient l'URL complète de la requête, y compris les paramètres de la requête
    $fullUrlWithQuery = $request->fullUrlWithQuery([]);

    return "L'URL complète avec les paramètres de requête est : $fullUrlWithQuery";
});

 */
