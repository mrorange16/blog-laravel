<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;
use App\Http\Requests;
use App\Repositories\Messages;
use App\Events\MessageWasReceived;
use App\Repositories\CacheMessages;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $messages;

    function __construct(CacheMessages $messages)
    {
        $this->messages=$messages;
        $this->middleware('auth',['except'=>['create','store']]);
    }
    public function index()
    {
        
        $messages=$this->messages->getPaginated();
//Cuando se hace el unittest hay que comentar la linea
        return view('messages.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('messages.create');
        //return "Mostrar el formulario de creacion de mensajes";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guardar mensaje
        //Query Builder
/*DB::table('messages')->insert([
"nombre"=>$request->input('nombre'),
"email"=>$request->input('email'),
"mensaje"=>$request->input('mensaje'),
"created_at"=>Carbon::now(),
"updated_at"=>Carbon::now()

]);*/

/*$message=new Message;
$message->nombre=$request->input('nombre');
$message->email=$request->input('email');
$message->mensaje=$request->input('mensaje');
//No son necesarias con Eloquent son a;adidas automaticamente
$message->created_at=Carbon::now();
$message->updated_at=Carbon::now();
$message->save();*/

$message=$this->messages->store($request);

//Eventos en pasados
event(new MessageWasReceived($message));


//Primero es la vista,luego los valores que le pasamos a la vista y de ultimo una funcion anonima
/*Mail::send('emails.contact',['msg'=>$message],function($m)use($message){
    $m->to($message->email,$message->nombre)->subject('Tu mensaje fue recibido');
});*/
/*
Almacena a un dato no guardado anteriormente
auth()->user()->messages()->create($request->all);
*/


        //Redireccionar
return redirect()->route('mensajes.create')->with('info','Hemos recibido tu mensaje');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$message=DB::table('messages')->where('id',$id)->first();

        //En caso de error usar findOrFail creo una carpeta llamada error con el codigo de error en este caso llamado 
        // ver carpeta views/errors

$message=$this->messages->findById($id);   

        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$message=DB::table('messages')->where('id',$id)->first();
        //En caso de error usar findOrFail creo una carpeta llamada error con el codigo de error en este caso llamado 
        // ver carpeta views/errors
        $message=$this->messages->findById($id);  
       // $message=Message::findOrFail($id);
        return view('messages.edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizamos
        
        
/*$message=DB::table('messages')->where('id',$id)->update([
"nombre"=>$request->input('nombre'),
"email"=>$request->input('email'),
"mensaje"=>$request->input('mensaje'),
"updated_at"=>Carbon::now()
]);*/

//Una opcion
/* $message=Message::findOrFail($id);
 $message->update($request->all());
*/

 //Segunda opcion
$message = $this->messages->update($request, $id);



//Redireccionamos
return redirect()->route('mensajes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar
//$message=DB::table('messages')->where('id',$id)->delete();

$message = $this->messages->destroy($id);
//Redireccionar
return redirect()->route('mensajes.index');


    }
}
