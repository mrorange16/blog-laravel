<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Validacion de formulario para mantener orden
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    //
  //  protected $request;

//Para acceder a los datos del post
   /* public function __construct(Request $request)
    {
    	$this->request = $request;
    }
*/

     public function __construct()
    {
    	//El segundo parametro es para aplicar el middleware a metodos especificos
$this->middleware('example',['only'=>['home']]);
    }

    public function home()
    {

      return view('home');

    }

     public function contacto()
    {

      return view('contactos');

    }

    // Se puede ver de la siguiente manera tambien el Request
    //  public function mensajes(Request $request)
    //Para ejecutar las validaciones en la url del parametro
       public function mensajes(CreateMessageRequest $request)
    {


//Reglas de validacion se usa el '|' para separar los valores sale con ALT+124
 /*   	$this->validate($request,[
'nombre' =>'required',
'email' =>'required|email',
'mensaje' => 'required|min:5'
]);
*/

//Cuando se devuelve un array laravel lo transforma en JSON
//return $request->all();

//Crea un session para verificar
return back()->with('info','Mensaje enviado');

     // return "Procesando...";

    	//Para no usar el constructor
    	//return $request->all();

    	//Para verificar el parametro
    	/*if ($this->request->has('nombre')) {
    		return "Tiene nombre..." . $this->request->input('nombre');
    	}*/



       // return "No tiene nombre...";
    	
    	//return $this->request->all();
       
    }

    public function saludo($nombre="Invitado")
    {

      //return "Saludos $nombre";
    //return view('saludo',['nombre' => $nombre]);
    //return view('saludo')->with(['nombre' => $nombre]);
    
    $html="<h2>Contenido html</h2>"; //ingresado por formulario
    $script="<script>alert('Problema XSS')</script>";
    $consolas=["PS4","XBO","SWICTH"];
    //compact crea un array con la variable que hace macth en el nombre
    return view('saludo',compact('nombre','html','script','consolas'));

    }
}
