@extends('app')

@section('tituloPagina', 'Inserción de Usuario')

@section('cabeceraContenido')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Creación de Usuario
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active">Usuario</li>
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
                        <h3 class="box-title">Usuario</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['url' => 'usuario', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fechaNacimiento" class="col-sm-3 control-label">Fecha Nacimiento</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" placeholder="Formato dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sexo" class="col-sm-3 control-label">Sexo</label>
                            <div class="col-sm-9">
                                <select name="sexo" class="form-control">
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nivel" class="col-sm-3 control-label">Nivel</label>
                            <div class="col-sm-9">
                                <select name="nivel" class="form-control">
                                    <option value="1">Web Administrador</option>
                                    <option value="2">Usuario</option>
                                </select>
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