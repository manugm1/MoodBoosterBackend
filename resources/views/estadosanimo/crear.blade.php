@extends('app')

@section('tituloPagina', 'Inserción de Estado de Ánimo')

@section('cabeceraContenido')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Creación de Estado de Ánimo
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active">Estado de Ánimo</li>
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
                        <h3 class="box-title">Estado de Ánimo</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['url' => 'estadoanimo', 'class' => 'form']) !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="marca" class="col-sm-2 control-label">Marca</label>
                                <div class="col-sm-10">
                                    <input type="text" name="marca" id="marca" class="form-control"  placeholder="Inserta una marca (equivale a una nota)">
                                </div>
                            </div>
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