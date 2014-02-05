<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Cobranza - Municipalidad de La Paz</title>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo base_url('assets/css/bootstrap.css');?> rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href=<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?> rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href=<?php echo base_url('assets/css/signin.css');?> rel="stylesheet">

</head>

<body>
        <div class="container-fluid landing-div">
        
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="intro-message">
                    
                        <h1>Si.Co.Paz</h1>
                        <h2>Sistema de Cobranza de la Municipalidad de La Paz</h2>
                        
                        <hr class="intro-divider"/>

                            <?php
                                $attributes = array('class' => 'form-signin', 'role' => 'form');
                                echo form_open('login/ingresar', $attributes);
                            ?>
                                    <h3 class="form-signin-heading">Ingreso</h3>
                                    <input id="username" name="username" type="username" class="form-control" placeholder="Usuario" required="" autofocus="">
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required="">
                                    <label class="checkbox recordar-datos">
                                    <input id="remember-me" name="remember-me" type="checkbox" value="remember-me"> Recordar mis datos
                                    </label>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                            <?php echo form_close();?>
                                
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    <!-- JavaScript -->
    <script src=<?php echo base_url('assets/js/jquery-1.10.2.js');?> ></script>
    <script src=<?php echo base_url('assets/js/bootstrap.js');?> ></script>

</body>

</html>
