@extends('layouts.layout')

@section('content')

<div id="page-content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table class='table'>
                    <thead>
                        <tr>
                            
                            <th>Nombre</th>
                            <th>Duración</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de Final</th>
                            <th>Estatus</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->duration}}</td>
                            <td>{{$course->start_date}}</td>
                            <td>{{$course->end_date}}</td>
                            <td>{{$course->status}}</td>
                            <td><a class="btn btn-small btn-success" href="{{ URL::to('course/' . $course->id_course) }}">Ver</a></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3>Weeks</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class='table'>
                    <thead>
                        <tr>
                            
                            <th>Tema</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de Final</th>
                            <th>Tiene Recursos</th>
                            <th>Ver</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($weeks as $week)
                    	@if(empty($week->resources[0]))
                        <tr> 
                            <td>{{$week->subject}}</td>
                            <td>{{$week->start_date}}</td>
                            <td>{{$week->end_date}}</td>
                            <th>Sin recursos</th>
                            <td><a class="btn btn-small btn-info" href="{{ URL::to('week/' . $week->id_week) }}">Ver</a></td>
                            <td><a class="btn btn-small btn-success" href="{{ URL::to('resource/create') }}">+ Agregar Recursos</a></td>
                        </tr>
                        @else
                        <tr> 
                            <td>{{$week->subject}}</td>
                            <td>{{$week->start_date}}</td>
                            <td>{{$week->end_date}}</td>
                            <th>Con Recursos</th>
                            <td><a class="btn btn-small btn-info" href="{{ URL::to('week/' . $week->id_week) }}">Ver</a></td>
                            <td><a class="btn btn-small btn-success" href="{{ URL::to('resource/create') }}">+ Agregar Recursos</a></td>
                        </tr>
                        @endif
                        @endforeach()
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

@endsection
