<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\MessagesController;



//Se cambia a PHPUnit_Framework_TestCase con pruebas unitarias y evitamos la inicializacion de todo laravel
class MessagesControllerTest extends PHPUnit\Framework\TestCase
{
   
   public function tearDown()
   {
   	Mockery::close();
   }
    //Debe tener el nombre del metodo con el prefijo test
    public function testIndex()
    {
    	//Simular clases
    	$messagesRepo = Mockery::mock("App\Repositories\CacheMessages");
        $controller = new MessagesController($messagesRepo);

        //Asegurar que el repository llame al metodo get paginated

        $messagesRepo->shouldReceive('getPaginated')->once();

        $controller->index();
    }
}
