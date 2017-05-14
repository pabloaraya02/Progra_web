@extends('layouts.layout')

@section('content')
    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Administrador - {{ Auth::user()->name }}</h1>
                            <div id="menu_edicion_roles">
                                <h3>Roles</h3>
                                <a href="{{ route('role.create') }}" class="btn btn-default" id="boton_agregar_rol">Agregar Nuevo Rol +</a>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                        <tr>
                                                                                   
                                            <td>{{$role->name}}</td>
                                            <td>{{$role->status}}</td>
                                            <td>
                                            <a class="btn btn-small btn-success" href="{{ URL::to('role/' . $role->id_role) }}">Show {{$role->name}}</a></td>
                                            <td>
                                            {!! Form::open(['method'=>'delete', 'route'=>['role.destroy', $role->id_role]]) !!}
                                                {!! Form::submit('Eliminar '.$role->name, ['class'=>'btn btn-danger', 'onclick'=> 'return confirm("Desea eliminar el role?")']) !!}
                                                    {!! Form::close() !!}
                                            
                                            </td>
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
