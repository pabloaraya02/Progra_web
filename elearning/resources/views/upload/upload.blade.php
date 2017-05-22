@extends('layouts.layout')

@section('content')

<div id="page-content-wrapper">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>Agregar video para el curso: {{$course->course_name}} - semanas: {{$week->start_date}} a {{$week->end_date}}</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
			
				<div class="about-section">
				   <div class="text-content">
				     <div class="span7 offset1">
				        @if(Session::has('success'))
				          <div class="alert-box success">
				          <h2>{!! Session::get('success') !!}</h2>
				          </div>
				        @endif
				        <div class="secure">Upload form</div>
				        {!! Form::open(array('url'=>'upload/'. $course->id_course . '/' . $week->id_week .'/' . $resource->id_resource, 'method'=>'POST', 'files'=>true)) !!}
				         <div class="control-group">
				          <div class="controls">
				          {!! Form::file('file') !!}
					  <p class="errors">{!!$errors->first('any')!!}</p>
					@if(Session::has('error'))
					<p class="errors">{!! Session::get('msg') !!}</p>
					@endif
				        </div>
				        </div>
				        <div id="success"> </div>
				      {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
				      {!! Form::close() !!}
				      </div>
				   </div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection