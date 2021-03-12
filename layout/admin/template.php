<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> The Resistance | Dashboard </title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Font Awesome -->
		<link rel="icon" href="<?php echo BASE_URL;?>layout/admin/img/theresistance.ico">
		<link rel="stylesheet" href="<?php  echo BASE_URL;?>layout/admin/plugins/fontawesome-free/css/all.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- overlayScrollbars -->
		<link rel="stylesheet" href="<?php  echo BASE_URL; ?>layout/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php  echo BASE_URL; ?>layout/admin/css/adminlte.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL;?>layout/admin/css/diseño.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<!--<link href="<?php  echo BASE_URL; ?>layout/admin/css/Desbootstrap.min.css" rel="stylesheet">  -->
		<!--<link href="<?php  echo BASE_URL; ?>layout/admin/css/bootstrappage.css" rel="stylesheet"/>-->
		<link href="<?php  echo BASE_URL; ?>layout/admin/css/main.css" rel="stylesheet"/>
		<link rel="stylesheet" href="<?php echo BASE_URL;?>layout/admin/css/jquery-ui.css">
		<!-- Google Font: Source Sans Pro -->
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"/>
		<link rel="stylesheet" type="text/css" media="screen"
		href="<?php echo BASE_URL;?>libraries/jqgrid/text/css/ui-lightness/jquery-ui-1.10.1.custom.min.css" />
		<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar navbar-dark navbar-navy">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button">
							<i class="fas fa-bars">
							</i>
						</a>
					</li>
					<li class="nav-item d-none d-sm-inline-block">
						<a href="<?php  echo BASE_URL; ?>" class="nav-link">
							Home
						</a>
					</li>
					<!--<li class="nav-item d-none d-sm-inline-block">
						<a href="#" class="nav-link">
							Contact
						</a>
					</li> -->
				</ul>

				<!-- SEARCH FORM -->
				<!--<form class="form-inline ml-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
								<i class="fas fa-search">
								</i>
							</button>
						</div>
					</div>
				</form>-->

				<!-- Right navbar links -->

			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-light-indigo elevation-4">
				<!-- Brand Logo -->
				<a href="<?php  echo BASE_URL; ?>" class="brand-link navbar-yellow">
					<img src="<?php echo $layout['img']; ?>theresistance.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
					<span class="brand-text font-weight">
						The Resistance
					</span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<img src="<?php echo $layout['img']; ?>AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
						</div>
						<div class="info">
							<a href="<?php  echo BASE_URL; ?>" class="d-block">
								Programación 4
							</a>
						</div>
					</div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" 
        data-widget="treeview" role="menu" data-accordion="false">
        
<!--Facturacion-->
        <li class="nav-item has-treeview">
	            <a href="#" class="nav-link active">
	              <i class="nav-icon fas fa-credit-card"></i>
	              <p>
	                Facturación
	                <i class="right fas fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>facturas" class="nav-link active">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Creación de Factura</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>mantenimientof" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Mant. Facturas</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>facturas/graficas" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Grafica de Ventas diarias</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>facturas/clientes" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Mantenimiento de clientes</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>facturas/consulta_cliente" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Consulta de clientes</p>
	                </a>
	              </li>
	            </ul>
        </li>

<!--Mantenimiento Productos-->
          	<li class="nav-item has-treeview">
	            <a href="#" class="nav-link active">
	              <i class="nav-icon fas fa-edit"></i>
	              <p>
	                Catalogo de Productos
	                <i class="right fas fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>productos" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Vista de Productos</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>productos/grids" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Mantenimiento de Productos</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>productos/categoria" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Mantenimiento de Categorias</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>productos/datatable" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Consulta de Producto</p>
	                </a>
	              </li>
	              
	            </ul>
          	</li>
        
<!-- Mantenimiento de usuarios -->
          
	        <li class="nav-item has-treeview">
		            <a href="#" class="nav-link active">
		              <i class="nav-icon fas fa-tachometer-alt"></i>
		              <p>
		                Mant. de Usuarios
		                <i class="right fas fa-angle-left"></i>
		              </p>
		            </a>
		            <ul class="nav nav-treeview">
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>usuarios" class="nav-link active">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>Ingreso de Usuarios</p>
		                </a>
		              </li>
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>usuarios/modificar_usuario" class="nav-link">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>Modificacion de Usuarios</p>
		                </a>
		              </li>
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>usuarios/eliminar_usuario" class="nav-link">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>Eliminacion de Usuarios</p>
		                </a>
		              </li>
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>usuarios/consulta_usuario" class="nav-link">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>Consulta de Usuarios</p>
		                </a>
		              </li>
		            </ul>
	        </li>
         
         
 <!--Mantenimiento departamentos-->
          	<li class="nav-item has-treeview">
	            <a href="#" class="nav-link active">
	              <i class="nav-icon fas fa-map"></i>
	              <p>
	                Departamentos
	                <i class="right fas fa-angle-left"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>catalogos/departamento" class="nav-link active">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Ingreso de Departamento</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>catalogos/departamento/modificar_departamento" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Modificacion de Departamento</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>catalogos/departamento/eliminar_departamento" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Eliminacion de Departamento</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>catalogos/departamento/consulta_departamento" class="nav-link">
	                  <i class="far fa-circle nav-icon"></i>
	                  <p>Consulta de Departamento</p>
	                </a>
	              </li>
	            </ul>
          	</li>
          
          <!--Parcial 1-->
	        	<li class="nav-item has-treeview">
		            <a href="#" class="nav-link">
		              <i class="nav-icon fas fa-copy"></i>
		              <p>
		                Investigacion Parcial 1
		                <i class="fas fa-angle-left  right"></i>
		              </p>
		            </a>
		            <ul class="nav nav-treeview">
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>parcial" class="nav-link">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>HTML</p>
		                </a>
		              </li>
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>parcial/bootstrap" class="nav-link">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>Bootstrap</p>
		                </a>
		              </li>
		              <li class="nav-item">
		                <a href="<?php echo BASE_URL;?>parcial/jquerys" class="nav-link">
		                  <i class="far fa-circle nav-icon"></i>
		                  <p>Jquery</p>
		                </a>
		              </li>
		            </ul>
          		</li>
          		
          		<!--Implementaciones Individuales-->
          	<li class="nav-item has-treeview">
	            <a href="#" class="nav-link">
	              <i class="nav-icon fas fa-book"></i>
	              <p>
	                Implementaciones
	                <i class="fas fa-angle-left right"></i>
	              </p>
	            </a>
	            <ul class="nav nav-treeview">
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>maria" class="nav-link">
	                  <i class="nav-icon fas fa-file"></i>
	                  <p>Maria</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>hillary" class="nav-link">
	                  <i class="nav-icon fas fa-file"></i>
	                  <p>Hillary</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>yasmin" class="nav-link">
	                  <i class="nav-icon fas fa-file"></i>
	                  <p>Yasmin</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>rodrigo" class="nav-link">
	                  <i class="nav-icon fas fa-file"></i>
	                  <p>Rodrigo</p>
	                </a>
	              </li>
	              <li class="nav-item">
	                <a href="<?php echo BASE_URL;?>manuel" class="nav-link">
	                  <i class="nav-icon fas fa-file"></i>
	                  <p>Manuel</p>
	                </a>
	              </li>
	              
	            </ul>
          	</li>
          
          
          <!--Inicio de Practica de Datatable y JqGrid-->
	        <ul class="nav-item has-treeview">
		        <a href="#" class="nav-link">
		        	<i class="nav-icon fas fa-box"></i>
		           		<p>JqGrid y DataTables<i class="right fas fa-angle-left">
		            </i></p>
		        </a>
		            
		        <ul class="nav nav-treeview">
			           <li class="nav-item has-treeview">
			            <a href="#" class="nav-link">
			              <i class="nav-icon fas fa-table"></i>
			              <p>
			                Hillary
			                <i class="fas fa-angle-left right"></i>
			              </p>
			            </a>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>hillgrids/hdatatable" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <ion-icon name=""></ion-icon>
			                  <p>DataTables</p>
			                </a>
			              </li>
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>hillgrids" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>JqGrid</p>
			                </a>
			              </li>
			            </ul>
			          </li>
			          
			          <li class="nav-item has-treeview">
			            <a href="#" class="nav-link">
			              <i class="nav-icon fas fa-table"></i>
			              <p>
			                Maria Paredes
			                <i class="fas fa-angle-left right"></i>
			              </p>
			            </a>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>margrids/datatable" class="nav-link">
			                  <i class="far fa-angle-right nav-icon"></i>
			                  <p>DataTables</p>
			                </a>
			              </li>
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>margrids" class="nav-link">
			                  <i class="far fa-angle-right nav-icon"></i>
			                  <p>JqGrid</p>
			                </a>
			              </li>
			            </ul>
			          </li>
			          <!---->
			          <li class="nav-item has-treeview">
			            <a href="#" class="nav-link">
			              <i class="nav-icon fas fa-table"></i>
			              <p>
			                Yasmin
			                <i class="fas fa-angle-left right"></i>
			              </p>
			            </a>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>yasdata/DataTable" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>DataTables</p>
			                </a>
			              </li>
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>yasdata/Jqgrid" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>JqGrid</p>
			                </a>
			              </li>
			            </ul>
			          </li>
			          
			          <li class="nav-item has-treeview">
			            <a href="#" class="nav-link">
			              <i class="nav-icon fas fa-table"></i>
			              <p>
			                Rodrigo Burgos
			                <i class="fas fa-angle-left right"></i>
			              </p>
			            </a>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>tablas_rod/DataTables" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>DataTables</p>
			                </a>
			              </li>
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>tablas_rod" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>JqGrid</p>
			                </a>
			              </li>
			            </ul>
			          </li>
			          
			          <li class="nav-item has-treeview">
			            <a href="#" class="nav-link">
			              <i class="nav-icon fas fa-table"></i>
			              <p>
			                Manuel
			                <i class="fas fa-angle-left right"></i>
			              </p>
			            </a>
			            <ul class="nav nav-treeview">
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>grids" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>JqGrid</p>
			                </a>
			              </li>
			              <li class="nav-item">
			                <a href="<?php echo BASE_URL;?>grids/datatable" class="nav-link">
			                  <i class="far fa-circle nav-icon"></i>
			                  <p>DataTables</p>
			                </a>
			              </li>
			            </ul>
			          </li>
			          					
				</ul>	
			</ul>
		</ul>
			<!--fin de Practica de Datatable y JqGrid-->		
      	</nav>
      
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">The Resistance</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <?php include_once $rutavista; ?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
				<strong>Copyright &copy; 2020
					<a href="<?php  echo BASE_URL; ?>">The Resistance</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
	var base_url = '<?php echo BASE_URL;?>';
	var ruta_img = '<?php echo BASE_URL;?>layout/admin/fotos/';
</script>



		<!-- jQuery -->
		<script src="<?php  echo BASE_URL; ?>layout/admin/plugins/jquery/jquery.min.js">
		</script>
		<!-- jQuery UI 1.11.4 -->
		<!--<script> $.widget.bridge('uibutton', $.ui.button) </script>-->
		<!-- Bootstrap 4 -->
		<script src="<?php  echo BASE_URL; ?>layout/admin/plugins/bootstrap/js/bootstrap.bundle.min.js">
		</script>
		<!-- AdminLTE App -->
		<!-- overlayScrollbars -->
		<script src="<?php  echo BASE_URL; ?>layout/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
		</script>
		<script src="<?php  echo BASE_URL; ?>layout/admin/js/adminlte.js">
		</script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php  echo BASE_URL; ?>layout/admin/js/demo.js"></script>fat
		<script src="<?php echo BASE_URL;?>layout/admin/js/jquery.mousewheel.js"> </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
		<script src="<?php echo BASE_URL;?>layout/admin/js/Chart.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>      
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo BASE_URL;?>libraries/jqgrid/js/i18n/grid.locale-es.js" type="text/javascript"> </script> 
        !-- date-range-picker -->
		<script src="<?php echo BASE_URL;?>layout/admin/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/piexif.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/plugins/sortable.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/js/fileinput.min.js"></script>
     
	
		<?php
		if (isset($layout['js']) && count($layout['js']))
		{
			for ($i=0; $i < count($layout['js']); $i++)
			{
				echo '<script src="'.$layout['js'][$i].'" type="text/javascript"></script>'.chr(10);
			};

		};
		?>
</body>
</html>
