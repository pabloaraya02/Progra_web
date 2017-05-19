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

                                <div class="about-section">
                                   <div class="text-content">
                                     <div class="span7 offset1">
                                        @if(Session::has('success'))
                                          <div class="alert-box success">
                                          <h2>{!! Session::get('success') !!}</h2>
                                          </div>
                                        @endif
                                        <div class="secure">Upload form</div>
                                        {!! Form::open(array('url'=>'upload/upload','method'=>'POST', 'files'=>true)) !!}
                                         <div class="control-group">
                                          <div class="controls">
                                          {!! Form::file('image') !!}
                                      <p class="errors">{!!$errors->first('image')!!}</p>
                                    @if(Session::has('error'))
                                    <p class="errors">{!! Session::get('error') !!}</p>
                                    @endif
                                        </div>
                                        </div>
                                        <div id="success"> </div>
                                      {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                                      {!! Form::close() !!}
                                      </div>
                                   </div>
                                </div>        


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
            </div>
        </div>
        <!-- /#page-content-wrapper -->

 


@endsection
