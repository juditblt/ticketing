<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    //return view('welcome');
    return "BOT Ticketing";
});

// többféle methodhoz is ok a route:
Route::match(['post', 'get'], '/testgetpost', function (){
    return "Get or Post request..";
});

// bármely típusú methodra ok:
Route::any('/testany', function (){
    return "Any method request";
});

// Dependency Injection
Route::get('/testrequest', function (Request $request){
    var_dump($request ->method());    // get  (HTTP Method)
    //var_dump($request -> input());   // inputok (_POST, _GET)
});

// Redirect Routes
// HTTP 302 Redirect - ideiglenes átirányítás
Route::redirect('/alma', '/testrequest');

// HTTP 301 Redirect - végleges átirányítás (pl. webold. megszűnése)
Route::permanentRedirect('/korte', 'testrequest');

// View Routes
// nézet közvetlen megjelenítése (később nevet is adtunk a route-nak):
Route::view('/testview', 'welcome') ->name('welcome');  // az eredeti laraveles old. jelenik meg...

// paramétert is adunk:
//Route::view('/testview', 'welcome', ['name' => 'Judit']);

// Route List: terminalon: php artisan route:list

// Route Parameters
// néha paraméterrel kell megadni a route-t, helyőrzőben adjuk meg
// a fgv. paraméterében azonos név kell!

Route::get('/book/{id}/rent/{number}', function ($id, $number){
    return 'Book:' . $id . ' Rent:' . $number;
});

// Dep. Inj.-nal együtt is O.K., de első helyen legyen a Request $r
// opcionális paraméter is O.K., de kötelező megadni default értéket! (? jel a helyőrzőnél)

Route::get('/car/{licence_plate?}', function ($licence_plate = null){
    return 'Car: ' . $licence_plate;
});

// Regular Expression a route paraméter megadásnál

Route::get('/user/{id}', function ($id){
    return 'User ' . $id;
}) ->where('id', '[0-9]+') ->name('regex');    // 0-9-ig és akárhányszor (+ jel)

// vannak egyszerűsítő metódusok is, pl. -> whereNumber('id'), vagy -> whereAlpha('name')

// Named Routes
// pl. a route fgv. visszaadja a 'welcome' nevű route elérési útját:
Route::get('/routename', function (){
    //return \route('welcome');   // http://localhost:8000/testview
    return \route('regex', ['id' =>2]);  // http://localhost:8000/user/2
});

// Pl. currentRouteName()
Route::get('/routeinfo', function (){
    $cr = "Route name: " . Route::currentRouteName() . "<br>";
    return $cr;
}) ->name("RouteInfo");
