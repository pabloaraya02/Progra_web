@extends('layouts.layout')

@section('content')


    @if($courseId === null || $weekId === null)
        <h2>Agregar Recurso</h2>
    @else
        <h2>Agregar Recurso</h2> <h3>{{$course->course_name}}</h3>  <h3>Semana: {{$week->start_date}}  -  {{$week->end_date}}</h3>
    @endif
	

    <!-- {!! Form::open(['url'=>'resource','class'=>'form-horizontal']) !!} -->
    {!! Form::open(array('url'=>'resource','method'=>'POST', 'files'=>true, 'class'=>'form-horizontal')) !!}


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
        <div class="form-group">
             {!! Form::label('notes', 'Notas', ['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                {!! Form::textarea('notes', null,  ['class'=>'form-control','rows' => 2, 'cols' => 40]) !!}
            </div>
        </div>
		<div class="form-group">
            {!! Form::label('id_resource_type','Tipo de recurso',['class'=>'control-label col-md-2']) !!}
            <div class="col-md-7">
                <select class='form-control' name="id_resource_type">
                    @foreach($resource_types as $resource_type)
                        <option value="{{ $resource_type->id_resource_type }}">{{ $resource_type->resource_type_name}}</option>
                    @endforeach
                </select>
                 {!! $errors->has('id_resource_type')?$errors->first('id_resource_type'):'' !!}
            </div>
    
        </div>
		
        <div class="form-group">
             {{--{!! Form::label('id_week', 'Week', ['class'=>'control-label col-md-2']) !!}--}}
            <div class="col-md-7">
                {!! Form::hidden('id_week', $weekId,  ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="about-section">
           <div class="text-content">
             <div class="span7 offset1">
                @if(Session::has('success'))
                  <div class="alert-box success">
                    <h2>{!! Session::get('success') !!}</h2>
                  </div>
                @endif
                <div class="secure">Cargar Archivo</div>
                
                <div class="control-group">
                    <div class="controls">
                        {!! Form::file('image') !!}
                        <p class="errors">{!!$errors->first('image')!!}</p>
                        @if(Session::has('error'))
                            <p class="errors">{!! Session::get('error') !!}</p>
                        @endif
                    </div>
                </div>
                <div id="success" class="col-md-offset-2 col-md-0"> </div>
              </div>
           </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-7">
                {!! Form::submit('Guardar', array('class'=>'btn btn-danger')) !!}
            </div>
        </div>
    {!! Form::close() !!}
@stop
