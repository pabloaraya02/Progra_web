@extends('layouts.layout')

@section('content')
    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Administrador - {{ Auth::user()->name }}</h1>
                            <div id="menu_edicion_usuarios">
                                <h3>Usuarios</h3>
                                <a href="/create_user" class="btn btn-default" id="boton_agregar_usuario">Agregar Nuevo Usuario +</a>
                            </div>
                            <div id="menu_edicion_cursos">
                                <h3>Cursos</h3>
                                <a class="btn btn-default" id="boton_agregar_curso">Agregar Nuevo Curso +</a>
                            </div>
                            <div id="menu_edicion_roles">
                                <h3>Roles</h3>
                                <a class="btn btn-default" id="agregar_rol">Agregar Nuevo Rol +</a>
                            </div>
                            <div id="menu_edicion_recursos">
                                <h3>sRecursos</h3>
                                <a class="btn btn-default" id="agregar_recurso">Agregar Nuevo Recurso +</a>
                            </div>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">Opciones de edición</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

 


@endsection
