<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">  
          <img id="logo1"  src="https://progressservices.com.ec/wp-content/uploads/2016/11/logo-toc-systems-1.jpg" alt="TocSystems" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>Toc Systems</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú De Contenidos</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i><span>Vista </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if ($_SERVER['REQUEST_URI'] <> "/admin/categoria")
          <li><a href="{{ route('Categoria') }}"><i class="fa fa-circle-o"></i>Categoria</a></li>
            @endif
            @if ($_SERVER['REQUEST_URI'] <> "/admin/item")
            <li><a href="{{ route('Items') }}"><i class="fa fa-circle-o"></i>Items-Respuesta</a></li>
            @endif
            @if ($_SERVER['REQUEST_URI'] <> "/admin/preguntasItems")
            <li><a href="{{ route('Pregunta')}}"><i class="fa fa-circle-o"></i>Preguntas-items</a></li>
            @endif
          </ul>
        </li>
       {{--  <li class="treeview active">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Ver Resultados</span>
          </a>
          <ul class="treeview-menu">
              <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i>Vista</a></li> 
            <li>
              <a href="{{ route('Respuesta')}}"><i class="fa fa-circle-o">
                </i>Resultados
              </a>
            </li>
          </ul>
        </li>  --}}
    </section>
    <!-- /.sidebar -->
  </aside>