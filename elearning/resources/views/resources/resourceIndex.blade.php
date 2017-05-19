@extends('layouts.layout')

@section('content')
    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Administrador - {{ Auth::user()->name }}</h1>
                            <div id="menu_edicion_resource">
                                <h3>Recursos</h3>
                                <a href="#" class="btn btn-default" id="boton_agregar_recurso">Agregar Nuevo Recurso +</a>
                                <form id="file-submit" enctype="multipart/form-data"  method="post" action="store2">
                                {!! csrf_field() !!}
                                    <input type="file" name="filename" id="filename"/>
                                    <input type="submit" class="btn btn-default" id="file-save" value="Guardar"/>    
                                </form>

                                {{--@if(Session::has('message'))
                                    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message') }}</div>
                                @endif--}}

                                <div id="file_uploaded">
                                    <h4>Recursos:</h4>
                                    <ul>
                    
                                    </ul>
                                    
                                </div>

                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>URL</th>
                                            <th>Note:</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">OPCIONES</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        {!! Form::open(array('url'=>'store2','method'=>'POST','files'=>true,'class'=>'form-horizontal'))!!}

                            <div class="form-group">
                                {!! Form::label('file', 'Seleccionar Archivo', ['class'=>'control-label col-md-2']) !!}
                                <div class="col-md-7">
                                    {!! Form::file('thefile') !!}
                                    {!! $errors->has('thefile')?$errors->first('nomfileNamebre'):'' !!}
                                </div>
                            </div>
                            {!! Form::submit('Subir',  ['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        

 


@endsection
