@extends('app')

@section('tituloPagina', 'Visualización de Usuarios Registrados')

@section('cabeceraContenido')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Visualización de Usuarios
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio </a></li>
        <li class="active">Usuarios</li>
    </ol>
</section>
@stop

@section('contenido')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Usuarios</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="tabla" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Fecha Nacimiento</th>
                                <th>Sexo</th>
                                <th>Nivel</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($var as $key => $valor)
                                <tr>
                                    <td>{{ $valor->email }}</td>
                                    <td>{{ $valor->nombre }}</td>
                                    <td>{{ $valor->fechaNacimiento }}</td>
                                    <td>{{ $valor->sexo }}</td>
                                    <td>{{ $valor->nivel }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Fecha Nacimiento</th>
                                <th>Sexo</th>
                                <th>Nivel</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
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

@section('footerExtra')
    <script>
        $( document ).ready(function() {
            $("#tabla").DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "0 Resultados.",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Ningún registro disponible",
                    "infoFiltered": "(filtrando _MAX_ registros totales)",
                    "search": "Buscar: ",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Último",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                }
            });
        });
    </script>
@stop