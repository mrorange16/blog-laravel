<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;//Esto se usa en el store

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//Aplica a todos los metodos de UsersController
    function __construct()
    {

//los dos puntos luego del middleware me premite enviar el valor desde aqui a CheckRoles
     $this->middleware('auth',['except'=>['show']]);
     //Permite a otros perfiles ingresar a la ruta
      $this->middleware(
        'roles:admin',['except' => ['edit','update','show']]
    );
     //$this->middleware('roles');

    }
    public function index()
    {
        //
        $users=\App\User::with(['roles','note','tags'])->get();

        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $roles=Role::pluck('name','id');

         return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    //Validacion de reuquest ver la carpeta correspondiente con el mismo nombre
    public function store(CreateUserRequest $request)
    {
        //
        //return $request;

       // $user=User::create($request->all());
         
         //Esto se hace para evitar hacer doble insert
        $user = (new User)->fill($request->all());

  if ($request->hasFile('avatar')) 
          {
             $user->avatar = $request->file('avatar')->store('public');
           }

           $user->save();


          $user->roles()->attach($request->roles);
        return redirect()->route('usuarios.index');

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
         $user=User::findOrFail($id);

         return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//
    {
        //
        $user=User::findOrFail($id);
        $this->authorize($user);
        $roles=Role::pluck('name','id');
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //ejecutar php artisan storage:link para ver las imagenes
       // make:migration add_avatar_to_users_table --table users
        
          $user=User::findOrFail($id);
          $this->authorize($user);
          if ($request->hasFile('avatar')) 
          {
             $user->avatar = $request->file('avatar')->store('public');
           }
          
          $user->update($request->only('name','email'));
          //Evita duplicados
         $user->roles()->sync($request->roles);

          return back()->with('info','Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id);

      //$this->authorize($user);
        $user->delete();
        return back();
    }
}
