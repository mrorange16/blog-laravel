<?php

namespace App;

use App\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



public function isAdmin()
{
    return $this->hasRoles(['admin']);
}

public function setPasswordAttribute($password)
{

$this->attributes['password']=bcrypt($password);

}

public function roles()
    {

 //return $this->belongsTo(Role::class);
return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function hasRoles(array $roles)
    {
        
      /*  foreach ($roles as $role) 
        {

foreach ($this->roles as $userRole) {*/
      //if ($this->roles->key===$role) 
  /*  if ($userRole->key===$role) 
          {
            return true;
          }*/

          return ($this->roles->pluck('key')->intersect($roles)->count());
/*}

       
        }
        return false;*/
    }

    public function messages()
    {

return $this->hasMany(Message::class);

    }
     public function note()
    {
        return $this->morphOne(Note::class,'notable');
    }
     public function tags()
    {
        //Eso ultimo porque a veces no ingresa esos valores
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }

       public function present()
    {
        return new UserPresenter($this);
    }

}
