@extends('layouts.layout')

@section('content')
    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Administrador - {{ Auth::user()->name }}</h1>
                            <div id="menu_edicion_cursos">
                                <h3>Cursos</h3>
                                <a href="{{route('course.create')}}" class="btn btn-default" id="boton_agregar_curso">Agregar Nuevo Curso +</a>
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
                                        @foreach($courses as $course)
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
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">OPCIONES</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

 


@endsection
