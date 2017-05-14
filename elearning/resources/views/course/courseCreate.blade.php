@extends('layouts.layout')

@section('content')

<h3>
	Crear Curso
</h3>
    {!! Form::open(['url'=>'role','class'=>'form-horizontal']) !!}


        <div class="form-group">
            {!! Form::label('name', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('name', null,  ['class'=>'form-control']) !!}
                {!! $errors->has('name')?$errors->first('nombre'):'' !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('duracion', 'Duraci&oacute;n en Semanas', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                <select name="duracion">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
                {!! $errors->has('duracion')?$errors->first('duracion'):'' !!}
            </div>
        </div>
        <div class="form-group">
             {!! Form::label('fechaIniciolabel', 'Fecha Inicio', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::date('fechaInicio', \Carbon\Carbon::now(),  ['id'=>'fechaInicio','class'=>'form-control']) !!}
            </div>
        </div>
		<div class="form-group">
             {!! Form::label('fechaFinalLbel', 'Fecha Inicio', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::date('fechaFinal', null,  ['id'=>'fechaFinal','class'=>'form-control']) !!}
            </div>
        </div>
		{{--s<div class="form-group">
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
		--}}
		
        <div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                {!! Form::submit('Guardar',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    
@stop
