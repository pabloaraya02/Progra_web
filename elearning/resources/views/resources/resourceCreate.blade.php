@extends('layouts.layout')

@section('content')

<h3>
	Crear Recurso
</h3>
    {!! Form::open(['url'=>'resource','class'=>'form-horizontal']) !!}


        <div class="form-group">
            {!! Form::label('name', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('name', null,  ['class'=>'form-control']) !!}
                {!! $errors->has('name')?$errors->first('nombre'):'' !!}
            </div>
        </div>
        <div class="form-group">
             {!! Form::label('url', 'URL', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('url', null,  ['class'=>'form-control']) !!}
            </div>
        </div>
		
		{{--<div class="form-group">
            {!! Form::label('password', 'Contrase&ntilde;a', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::password('password',['class'=>'form-control']) !!}
                {!! $errors->has('password')?$errors->first('password'):'' !!}
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('password_confirmation', 'Confirme Contrase&ntilde;a', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                {!! $errors->has('password_confirmation')?$errors->first('password_confirmation'):'' !!}
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('country', 'Pa&iacute;s', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('country', null,  ['class'=>'form-control']) !!}
                {!! $errors->has('country')?$errors->first('country'):'' !!}
            </div>
        </div>
				
		<div class="form-group">
            {!! Form::label('sex', 'Sexo', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
				<select name="sex">
	                <option value="Masculino">Masculino</option>
	                <option value="Femenino">Femenino</option>
            	</select>
                {!! $errors->has('sex')?$errors->first('sex'):'' !!}
            </div>
        </div>	

        <div class="form-group">
            {!! Form::label('id_role','Role',['class'=>'control-label col-md-2']) !!}
	        <div class="col-md-7">
	            <select class='form-control' name="id_role">
	                @foreach($roles as $role)
	                    <option value="{{ $role->id_role }}">{{ $role->name}}</option>
	                @endforeach
	            </select>
	             {!! $errors->has('id_role')?$errors->first('id_role'):'' !!}
	        </div>
    
        </div>
		
		
        <div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                {!! Form::submit('Guardar',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>--}}
    {!! Form::close() !!}
@stop
