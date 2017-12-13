  {!! csrf_field() !!}
<!-- Todo se identifica a travez del name para las validaciones -->
<p><label for="avatar">
	<input type="file" name="avatar" value="" ></label>
		{!! $errors->first('avatar','<span class="error">:message</span>')!!}
</p>
<p>
	<label for="name">
    Nombre
	<input class="form-control" type="text" name="name" value="{{ $user->name or old('name') }}">
	<!-- Textos se encuentran en resources/lang/en/validate.php -->
	{!! $errors->first('name','<span class="error">:message</span>')!!}
    </label>
    </p>
    	<p>
	<label for="email">
    Email
	<input class="form-control" type="email" name="email" value="{{ $user->email or old('email') }}">
	{!! $errors->first('email','<span class="error">:message</span>')!!}
    </label>
    </p>

@unless ($user->id)
  <p>
  <label for="password">
    Password
  <input class="form-control" type="password" name="password">
  <!-- Textos se encuentran en resources/lang/en/validate.php -->
  {!! $errors->first('password','<span class="error">:message</span>')!!}
    </label>
    </p>

    <p>
  <label for="password_confirmation">
    Password Confirm
  <input class="form-control" type="password" name="password_confirmation">
  <!-- Textos se encuentran en resources/lang/en/validate.php -->
  {!! $errors->first('password','<span class="error">:message</span>')!!}
    </label>
    </p>
@endunless
  

       <div class="checkbox">
    @foreach ($roles as $id=>$name)
    	{{-- expr --}}
  



   	<label><input 
   		type="checkbox" 
   		value="{{$id}}" 
   		{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
   		name="roles[]" >
{{$name}}
   	</label>

   
     @endforeach

     </div>
     {!! $errors->first('roles','<span class="error">:message</span>')!!}
     <hr/>