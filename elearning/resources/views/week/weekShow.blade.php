@extends('layouts.layout')

@section('content')



<div id="page-content-wrapper">
	<div class="container-fluid">
	
		<div class="row">
			<div class="col-md-12">
				<h3>Resources for week {{$week->start_date}} - {{$week->end_date}}</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class='table'>
                    <thead>
                        <tr>
                            
                            <th>nombre</th>
                            <th>url</th>
                            <th>Notas</th>
               
                            {{--<th>Ver</th>
                            <th>Editar</th>--}}
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($resources as $resource)
              
                        <tr> 
                            <td>{{$resource->name}}</td>
                            <td>{{$resource->url}}</td>
                            <td>{{$resource->notes}}</td>
                            
                            {{--<td><a class="btn btn-small btn-info" href="{{ URL::to('resource/' . $resource->id_resource) }}">Ver</a></td>
                            <td><a class="btn btn-small btn-success" href="{{ URL::to('resource/create/'. $course->id_course . '/' . $resource->id_resource) }}">+ Agregar Recursos</a></td>--}}
                        </tr>

                        
                        @endforeach()
                    </tbody>
                </table>
			</div>
		</div>
	</div>
</div>

@endsection



