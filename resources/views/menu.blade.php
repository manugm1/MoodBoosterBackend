<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview {{ classActivePath('estadoanimo*') }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Estados de Ánimo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ classActivePath('estadoanimo/create') }}"><a href="{!! URL::to('estadoanimo/create') !!}" ><i class="fa fa-circle-o"></i> Insertar</a></li>
                    <li class="{{ classActivePath('estadoanimo') }}"><a href="{!! URL::to('estadoanimo') !!}"><i class="fa fa-circle-o"></i> Ver Todos</a></li>
                </ul>
            </li>

            <li class="treeview {{ classActivePath('recomendacion*') }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Recomendaciones</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ classActivePath('recomendacion/create') }}"><a href="{!! URL::to('recomendacion/create') !!}"><i class="fa fa-circle-o"></i> Insertar</a></li>
                    <li class="{{ classActivePath('recomendacion') }}"><a href="{!! URL::to('recomendacion') !!}"><i class="fa fa-circle-o"></i> Ver Todas</a></li>
                </ul>
            </li>

            <li class="treeview {{ classActivePath('usuario*') }}">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Usuarios</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ classActivePath('usuario/create') }}"><a href="{!! URL::to('usuario/create') !!}"><i class="fa fa-circle-o"></i> Insertar</a></li>
                    <li class="{{ classActivePath('usuario')}}"><a href="{!! URL::to('usuario') !!}"><i class="fa fa-circle-o"></i> Ver Todos</a></li>
                </ul>
            </li>

            <!--<li class="header">MÁS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Aplicación</span></a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
