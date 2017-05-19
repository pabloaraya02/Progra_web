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
                                <a class="btn btn-small btn-success" href="{{ URL::to('resource/create/') }}">+ Agregar Recurso</a>
                                {{--@if(Session::has('message'))
                                    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message') }}</div>
                                @endif--}}

                                <div id="file_uploaded">
                                    
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
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        

 


@endsection
