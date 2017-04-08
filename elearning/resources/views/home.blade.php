@extends('layouts.layout')

@section('content')
    <div id="wrapper" class="NotToggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li>
                    <a href="#">Editar Usuarios</a>
                </li>
                <li>
                    <a href="#">Editar Cursos</a>
                </li>
                <li>
                    <a href="#">Editar Roles</a>
                </li>
                <li>
                    <a href="#">Editar Recursos</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Administrador - {{ Auth::user()->name }}</h1>
                            <div id="menu_edicion_usuarios">
                                <h3>Editar Usuarios</h3>
                                <a class="btn btn-default" id="boton_agregar_usuario">Agregar Nuevo Usuario +</a>
                            </div>
                            <div id="menu_edicion_cursos">
                                <h3>Editar Cursos</h3>
                                <a class="btn btn-default" id="boton_agregar_curso">Agregar Nuevo Curso +</a>
                            </div>
                            <div id="menu_edicion_roles">
                                <h3>Editar Roles</h3>
                                <a class="btn btn-default" id="agregar_rol">Agregar Nuevo Rol +</a>
                            </div>
                            <div id="menu_edicion_recursos">
                                <h3>Editar Recursos</h3>
                                <a class="btn btn-default" id="agregar_recurso">Agregar Nuevo Recurso +</a>
                            </div>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">Opciones de edición</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
<!-- /#wrapper -->


@endsection
