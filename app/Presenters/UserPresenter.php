<?php

namespace App\Presenters;

use App\User;
use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter
{
	

	public function link()
	{
	return new HtmlString("<a href='" . route('usuarios.show',$this->model->id) . "'> {$this->model->name}</a>");
	}
	public function roles()
	{
	return $this->model->roles->pluck('name')->implode(' - ');
    }
   public function notes()
	{
	return $this->model->note ? $this->model->note->body : '';
	}

	public function tags()
	{
	return $this->model->tags->pluck('name')->implode(', ') ;
	}
}