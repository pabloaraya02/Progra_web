@extends('layouts.layout')

@section('content')

<h3>
	Crear Curso
</h3>
    {!! Form::open(['url'=>'course','class'=>'form-horizontal']) !!}


        <div class="form-group">
            {!! Form::label('course_name', 'Nombre', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('course_name', null,  ['class'=>'form-control']) !!}
                {!! $errors->has('course_name')?$errors->first('course_name'):'' !!}
            </div>
        </div>
        
        {{--<div class="form-group">
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
        </div>--}}
        <div class="form-group">
             {!! Form::label('fechaIniciolabel', 'Fecha Inicio', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::date('start_date', null,  ['id'=>'start_date','class'=>'form-control']) !!}
            </div>
        </div>
		<div class="form-group">
             {!! Form::label('fechaFinalLbel', 'Fecha Final', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::date('end_date', null,  ['id'=>'end_date','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('duration', 'Duraci&oacute;n en Semanas', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::text('duration', null,  ['class'=>'form-control','id'=>'duration']) !!}
                {!! $errors->has('duration')?$errors->first('duration'):'' !!}
            </div>
        </div>
        {{--<div class="form-group">
            {!! Form::label('status', 'Estatus', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                <select name="status">
                    <option value="1">Active</option>
                    <option value="2">Desactivado</option>
                </select>
                {!! $errors->has('status')?$errors->first('status'):'' !!}
            </div>
        </div>  --}}
		
		
        <div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                {!! Form::submit('Guardar',  ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    
@stop
