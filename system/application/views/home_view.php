<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trivia CBC :|: 2015</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/css/animate.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
    	<div class="col-lg-6 background">
    		<img src="<?= base_url('assets/img/cbclogo.png'); ?>" style="float: left; margin-top: 10px; margin-bottom: 10px;" />
    		<h3 class="punteo"><span><i class="fa fa-flash"></i></span> <span class="punteoSuma">0</span></h3>
    		<h3 class="tiempo"><span><i class="fa fa-clock-o"></i></span> <span class="count">00:00</span></h3>
    		<div class="clearfix"></div>
    		<div class="contenedor flipInX animated">
    			<br>
    			<h1 class="welcome">Bienvenido <?= $usuario; ?></h1>
    			<br>
    			<div style="text-align: center;">
	    			<a href="#" class="btn btn-default btn-lg botonSel jugar">JUGAR TRIVIA</a>
	    			<br>
	    			<a href="#" class="btn btn-default btn-lg botonSel rank">VER RANKING</a>
    			</div>
    		</div>	
    		<h5 class="usuarioLogin fadeIn animated"><i class="fa fa-user"></i> <?= $usuario; ?></h5>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
    	var base = "<?= base_url(); ?>";
    	var idusuario = 0;
    	var objetoHome = $('.contenedor').html();
    </script>
    <script src="<?= base_url('assets/js/jquery.countdown.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/script.js'); ?>"></script>
  </body>
</html>