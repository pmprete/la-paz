<html>
    <head>
        <title><?php $title_for_layout ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap core CSS -->
        <link href=<?php echo base_url('assets/css/bootstrap.css') ?> rel="stylesheet">

        <!-- Custom Google Web Font -->
        <link href=<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?> rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

        <!-- Add custom CSS here -->
        <link href=<?php echo base_url('assets/css/landing-page.css') ?> rel="stylesheet">
        <link href=<?php echo base_url('assets/css/signin.css') ?> rel="stylesheet">
        <!-- JavaScript -->
        <script src=<?php echo base_url('assets/js/jquery-1.10.2.js') ?>></script>
        <script src=<?php echo base_url('assets/js/bootstrap.js') ?>></script>

    </head>
    <body>
        <div id="pagewidth" >
            <?php echo anchor('busqueda/index', 'Busqueda', array('id' => 'busqueda')); ?>
            <?php echo anchor('movimientos/index', 'Movimientos', array('id' => 'movimientos')); ?>
            <?php echo anchor('reporte/index', 'Reporte', array('id' => 'reporte')); ?>

            <div id="wrapper" class="clearfix" >
                <div id="twocols" class="clearfix">
                    <?php echo $content_for_layout ?>
                </div>
            </div>
            <div id="footer" > Footer </div>
        </div>
    </body>
</html>