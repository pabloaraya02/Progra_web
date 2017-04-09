@extends('layouts.layout')

@section('content')
    
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Bienvenido {{ Auth::user()->name }}</h1>
                        <a onclick="hideSide()" class="btn btn-default" id="menu-toggle">Opciones de edición</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

 


@endsection
