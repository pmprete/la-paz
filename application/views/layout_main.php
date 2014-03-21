<html>
<head>
    <title><?php $title_for_layout ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <link href=<?php echo base_url('assets/css/bootstrap.min.css'); ?> rel="stylesheet">
    <!-- Custom Google Web Font -->
    <link href=<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?> rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Homenaje' rel='stylesheet' type='text/css'>
    <!-- Bootstrap Multiselect -->
    <!--<link href=<?php echo base_url('assets/css/bootstrap-multiselect.css'); ?> rel="stylesheet"> -->

    <!-- Add custom CSS here -->
    <link href=<?php echo base_url('assets/css/style.css'); ?> rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand mini-title" href="index.html">Sistema de Cobranza</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <a class="navbar-brand" href="index.html">Sistema de Rentas - Municipalidad de La Paz</a>
            <ul class="nav navbar-nav side-nav">
                <li class="active"><a href="<?php echo site_url("escritorio/index");?>"><i class="fa fa-dashboard"></i> Escritorio</a></li>
                <li><a href="<?php echo site_url("reportes/index");?>"><i class="fa fa-bar-chart-o"></i> Reportes</a></li>
                <li><a href="<?php echo site_url("movimientos/index");?>"><i class="fa fa-edit"></i> Nuevos Movimientos</a></li>
                <li><a href="<?php echo site_url("busquedas/index");?>"><i class="fa fa-desktop"></i> Busquedas</a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Configuraciones</a></li>
                <li><a href="<?php echo site_url("contribuyentes/index");?>"><i class="fa fa-file"></i> Nuevo Contribuyente</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i>
                        Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Dropdown Item</a></li>
                        <li><a href="#">Another Item</a></li>
                        <li><a href="#">Third Item</a></li>
                        <li><a href="#">Last Item</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Usuario"><i class="fa fa-user"></i>
                        <?php echo $this->session->userdata('username');?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> Perfil </a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Configuracion</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-power-off"></i> Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <!-- /Sidebar -->

    <div id="page-wrapper">
        <?php echo $content_for_layout ?>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- JavaScript -->
<script type="text/javascript" src=<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>></script>
<script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap.js'); ?>></script>
<!--<script type="text/javascript" src=<?php echo base_url('assets/js/bootstrap-multiselect.js'); ?>></script>-->


<!-- Page Specific Plugins -->
<!--<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script type="text/javascript" src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>-->
<!--<script type="text/javascript" src="js/morris/chart-data-morris.js"></script>-->
<!--<script type="text/javascript" src="js/tablesorter/jquery.tablesorter.js"></script>-->
<!--<script type="text/javascript" src="js/tablesorter/tables.js"></script>-->

<!-- My JavaScript -->
<script src=<?php echo base_url('assets/js/script.js'); ?>></script>

</body>
</html>

