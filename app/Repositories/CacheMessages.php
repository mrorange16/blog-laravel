<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Cache;

class CacheMessages implements MessagesInterface
{
	protected $messages;

    function __construct(Messages $messages)
    {

        $this->messages=$messages;
        
    }

	public function getPaginated(){

//Sin eloquent
        //$messages=DB::table('messages')->get();

        //$messages=Message::all();

        $key="messages.page." . request('page',1);

//Esto es lo mismo de abajo
        return Cache::tags('messages')->rememberForever($key,function(){   

        	return $this->messages->getPaginated();

        });


}


public function store($request){

$message = $this->messages->store($request);
//Para actualizar el cache en este caso borra y el index crea un nuevo cache y elimina la cache en especifico en este caso
//'messages'
Cache::tags('messages')->flush();

return $message;

}

public function findById($id){

return Cache::tags('messages')->rememberForever("messages.{$id}",function()use($id){

    return $this->messages->findById($id);

});
     
}

public function update($request,$id){

$message = $this->messages->update($request,$id);

 Cache::tags('messages')->flush();

return $message;

}

public function destroy($id){

$message = $this->messages->destroy($id);

 Cache::tags('messages')->flush();

return $message;

}


}