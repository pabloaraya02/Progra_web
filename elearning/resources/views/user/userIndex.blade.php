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
                                <a href="{{ route('user.create') }}" class="btn btn-default" id="boton_agregar_usuario">Agregar Nuevo Usuario +</a>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Sexo</th>
                                            <th>Pa&iacute;s</th>
                                            <th>Lenguaje</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->sex}}</td>
                                                <td>{{$user->country}}</td>
                                                <td>{{$user->Language}}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-success">Editar</a>
                                                </td>
                                                <td>
                                                <td>{!! Form::open(['method'=>'delete', 'route'=>['user.destroy', $user->id_user]]) !!}
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger', 'onclick'=> 'return confirm("Desea eliminar el usuario?")']) !!}
                                                    {!! Form::close() !!}</td>
                                              </td>   
                                            </tr>
                                            
                                        @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">Opciones de edición</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

 


@endsection
