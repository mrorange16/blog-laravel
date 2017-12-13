<?php

namespace App\Repositories;

/*use DB;
use Carbon\Carbon;*/
use App\Message;


class Messages implements MessagesInterface
{



public function getPaginated(){


//Forma optimizada de obtener los datos
        return Message::with(['user','note','tags'])->paginate(5);

        /*    if(Cache::has($key))
        {
            $messages=Cache::get($key);
        }
        else{ //Forma optimizada de obtener los datos
        $messages=Message::with(['user','note','tags'])->paginate(2);

        Cache::put('messages.all',$messages,5);
    }*/
}


public function store($request){
       
$message=Message::create($request->all());

//Se define la relacion en el modelo user
if(auth()->check())
{
auth()->user()->messages()->save($message);
}



return $message;
}

public function findById($id){

	

    return Message::findOrFail($id);


     
}

public function update($request,$id){

	

 return Message::findOrFail($id)->update($request->all());

}

public function destroy($id){



return Message::findOrFail($id)->delete();

}

}