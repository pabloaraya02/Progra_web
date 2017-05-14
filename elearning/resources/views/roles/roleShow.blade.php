@extends('layouts.layout')

@section('content')


<div class="page-content-wrapper">
	
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-12">
				
				<h1>Administrador - {{ Auth::user()->name }}</h1>
				<h2>Mostrando el rol: {{$role[0]->name}}</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<h3>Usuarios en este rol:</h3>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Correo</th>
						</tr>
						
					</thead>
						
						
					<tbody>
						@foreach($users as $user)
							
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
							</tr>
						@endforeach()

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
