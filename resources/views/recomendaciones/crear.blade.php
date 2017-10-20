@extends('app')

@section('tituloPagina', 'Inserción de Recomendación')

@section('cabeceraContenido')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Creación de Recomendación
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active">Recomendación</li>
    </ol>
</section>
@stop

@section('contenido')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-6  col-xs-offset-3">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Recomendación</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['url' => 'recomendacion', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="titulo" class="col-sm-3 control-label">Título</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="autor" class="col-sm-3 control-label">Autor</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Una breve descripción...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duracion" class="col-sm-3 control-label">Duración</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="duracion" id="duracion" placeholder="Duración de la canción">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rutaImagen" class="col-sm-3 control-label">Imagen</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="rutaImagen" id="rutaImagen" placeholder="Agrega una imagen (opcional)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rutaOrigen" class="col-sm-3 control-label">Ruta Origen</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="rutaOrigen" id="rutaOrigen" placeholder="Ruta origen (opcional)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tipoRecomendacion" class="col-sm-3 control-label">Tipo Recomendación</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="tipoRecomendacion" id="tipoRecomendacion">
                                        <option value="1">Frase</option>
                                        <option value="2">Música</option>
                                        <option value="3">Película</option>
                                </select>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="estadoAnimo" class="col-sm-3 control-label">Estado Ánimo</label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="estadoAnimo" id="estadoAnimo">
                                    @foreach($estadosAnimo as $key => $value)
                                        <option>{{$value->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- /.form-group -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="submit" class="btn btn-info pull-right">Crear</button>
                    </div><!-- /.box-footer -->
                    {!! Form::close() !!}
                </div><!-- /.box -->
            </div><!-- ./col -->


        </div><!-- /.row -->
        <!-- Main row -->
        <div class="row">

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">




            </section><!-- right col -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->

@stop