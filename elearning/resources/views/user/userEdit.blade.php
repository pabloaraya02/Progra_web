@extends('layouts.layout')

@section('content')

<h3>
	Edit Usuario {{$user->name}} - {{$user->email}}
</h3>
    {!! Form::model($user,['route'=>['user.update', $user->id_user], 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
     {{--{!! Form::open(['route' => ['user.update', $user->id_user]],'class' => 'form-horizontal']) !!}--}}
         

        {{ method_field('PUT') }}


        <div class="form-group">
            {!! Form::label('name', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('name', $user->name,  ['class'=>'form-control']) !!}
                {!! $errors->has('name')?$errors->first('nombre'):'' !!}
            </div>
        </div>
        <div class="form-group">
             {!! Form::label('email', 'Email', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('email', $user->email,  ['class'=>'form-control']) !!}
                {!! $errors->has('email')?$errors->first('email'):'' !!}
            </div>
        </div>
		
		<div class="form-group">
            {!! Form::label('password', 'Contrase&ntilde;a', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::password('password', null,['class'=>'form-control']) !!}
                {!! $errors->has('password')?$errors->first('password'):'' !!}
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('password_confirmation', 'Confirme Contrase&ntilde;a', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::password('password_confirmation', null,['class'=>'form-control']) !!}
                {!! $errors->has('password_confirmation')?$errors->first('password_confirmation'):'' !!}
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('country', 'Pa&iacute;s', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('country', $user->country,  ['class'=>'form-control']) !!}
                {!! $errors->has('country')?$errors->first('country'):'' !!}
            </div>
        </div>
				
		<div class="form-group">
            {!! Form::label('sex', 'Sexo', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
				<select name="sex">
                    @if($user->sex == 'Masculino')
                        <option selected="selected" value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    @else
                        <option value="Masculino">Masculino</option>
                        <option selected="selected" value="Femenino">Femenino</option>
                    @endif
	                
	                
            	</select>
                {!! $errors->has('sex')?$errors->first('sex'):'' !!}
            </div>
        </div>	

        <div class="form-group">
            {!! Form::label('id_role','Role',['class'=>'control-label col-md-2']) !!}
	        <div class="col-md-7">
	            <select class='form-control' name="id_role">
	                {{--@foreach($availableRoles as $aRole)
    	                    @if($aRole->id_role == $userRoleID)
                                <option selected value="{{ $aRole->id_role }}">{{ $aRole->name}}</option>
                            $else
                                <option value="{{ $aRole->id_role }}">{{ $aRole->name}}</option>
                            @endif  
	                @endforeach--}}
                    @foreach($availableRoles as $aRole)
                            
                        <option value="{{ $aRole->id_role }}">{{ $aRole->name}}</option>
                            
                    @endforeach
	            </select>
	             {!! $errors->has('id_role')?$errors->first('id_role'):'' !!}
	        </div>
    
        </div>
		
		
        <div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                {!! Form::submit('Actualizar',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop
