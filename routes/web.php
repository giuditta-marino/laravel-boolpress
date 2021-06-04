<?php

use Illuminate\Support\Facades\Route;
use App\Post;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
// Route::get('/blog', function(){
//   $posts = Post::all();
//   return view('guests.blog', compact('posts'));
// });
Route::get('/contact', function(){
  return view('guests.contact');
})->name('contactus');
Route::get('/blog', 'PostController@index')->name('blog');
Route::get('/show/{slug}', 'PostController@show')->name('post');
Route::get('/categories/{slug}', 'CategoryController@index')->name('category.index');
Route::post('mails', 'ContactController@index')->name('contact');

//tutte le rotte che raggruppo sono soggette al middleware di autenticazione, sono le rotte il cui controller sta sotto il namespace Admin(nome della cartella in cui è contenuto il controller, tutte avranno prefisso 'admin' e come nome condiviso 'admin.' e dentro ci inseriamo la route che va alla dashboard perché punta a HomeController@index nella cartella Admin. Questa route è raggiungibile aggiungendo a localhost:8000/admin/ perché oltre allo slash che indichiamo come parametro della funzione get abbiamo prima il prefix 'admin'
Route::prefix('admin')
->namespace('Admin')
->middleware('auth')
->name('admin.')
->group(function () {
Route::get('/', 'HomeController@index')
->name('index');
//il primo parametro è il prefisso che prenderanno le rotte, il secondo il controller a cui sono collegate
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');
});
