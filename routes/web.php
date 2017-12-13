<?php

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


//Ese route con el nombre es para crear un alias para no cambiar cada link cuando se necesite modificar una URL
//Route::get('/', ['as'=>'home',function () {
   // return view('welcome');
	/*echo "<a href=".route('contactos').">Contacto</a><br>";*/
//	return view('home');
//}]);

//Crear usuario forma rapida
/*
Route::get('test',function(){

$user=new App\User;
$user->name='Axel';
$user->email='marukosu16@yahoo.com';
$user->password=bcrypt('solycain');//la otra clave fue 12341234
$user->role='estudiante';
$user->save();


});*/
//Me permite ver los SQL de una vista
/*DB::listen(function($query){
    echo "<pre>{$query->sql} </pre>";
});*/

//pRUEBA PARA DESPACHAR JOBS
// Route::get('job',function(){

// dispatch(new App\Jobs\SendEmail);

// return 'Listo';

// });


Route::get('roles',function(){

return \App\Role::width('user')->get();

});
//para utilizar el metodo home de PagesController
Route::get('/', ['as'=>'home','uses'=>'PagesController@home'])->middleware('example');

Route::get('contactanos', ['as'=>'contactos','uses'=>'PagesController@contacto']);

//Formulario de contacto
Route::post('contacto', 'PagesController@mensajes');

Route::get('saludos/{nombre?}', ['as'=>'saludos','uses'=>'PagesController@saludo'])->where('nombre',"[A-Za-z]+");

//Casi siempre cuando es estilo REST
Route::resource('mensajes','MessagesController');

Route::resource('usuarios','UsersController');

Route::get('login','Auth\LoginController@showLoginForm');

Route::post('login','Auth\LoginController@login');
//Ir a AuthenticatesUsers.php para cambiar a donde lo quiere redireccionar cuando haga logout
Route::get('logout','Auth\LoginController@logout');

//Nueva convencion para el alias ubicar mejor de donde proviene
/*Route::get('mensajes/create',['as'=>'messages.create','uses'=>'MessagesController@create']);

Route::post('mensajes',['as'=>'messages.store','uses'=>'MessagesController@store']);

Route::get('mensajes',['as'=>'messages.index','uses'=>'MessagesController@index']);

Route::get('mensajes/{id}',['as'=>'messages.show','uses'=>'MessagesController@show']);

Route::get('mensajes/{id}/edit',['as'=>'messages.edit','uses'=>'MessagesController@edit']);

Route::put('mensajes/{id}',['as'=>'messages.update','uses'=>'MessagesController@update']);

Route::delete('mensajes/{id}',['as'=>'messages.destroy','uses'=>'MessagesController@destroy']);*/

//Ver todas las URLs de uno en especifico
//Route::resource('mensajes','MessagesController');


// ese as es para crear un alias a la URL
/*Route::get('contactanos', ['as'=>'contactos', function () {
    //return "Hola desde contacto";

    return view('contactos');
}]);*/


//Cuando el parametro es obligatorio
/*
Route::get('saludos/{nombre}', function ($nombre) {
    return "Saludos $nombre";
});*/


//Cuando el parametro es opcional
/*
Route::get('saludos/{nombre?}', function ($nombre="Invitado") {
    return "Saludos $nombre";
});*/


//Cuando el parametro sea solo palabras, validar
/*
Route::get('saludos/{nombre?}',['as'=>'saludos', function ($nombre="Invitado") {
    //return "Saludos $nombre";
    //return view('saludo',['nombre' => $nombre]);
    //return view('saludo')->with(['nombre' => $nombre]);
    
    $html="<h2>Contenido html</h2>"; //ingresado por formulario
    $script="<script>alert('Problema XSS')</script>";
    $consolas=["PS4","XBO","SWICTH"];
    //compact crea un array con la variable que hace macth en el nombre
    return view('saludo',compact('nombre','html','script','consolas'));
}])->where('nombre',"[A-Za-z]+");*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
