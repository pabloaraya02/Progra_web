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
                                <a href="#" class="btn btn-default" id="boton_agregar_curso">Agregar Nuevo Curso +</a>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Duración</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">Opciones de edición</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

 


@endsection
