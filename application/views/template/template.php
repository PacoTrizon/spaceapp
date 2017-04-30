<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Wiki Space</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<!-- Bootstrap itself -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/spaceapp.css')?>">

	<!-- Fonts -->
	<link href="<?php echo base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/fonts/font-face.css')?>" rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/alertify.min.css')?>">
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">

<nav class="mainmenu">
	<div class="container">
		<div class="dropdown">
			<button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<li><a menu="1" class="active VerModal">Ingresar</a></li>
				<li><a menu="2" class="active VerModal" >Registrar</a></li>
			</ul>
		</div>
	</div>
</nav>


<!-- Main (Home) section -->
<section class="section" id="head">
	<div class="container">

		<div class="row">
      <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
        <h1 class="title">Wiki Space</h1>
      </div>
			<input type="hidden" id="base_url" name="" value="<?php echo base_url()?>">
      <!-- contenido -->
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center bordered1">
        <?php if (isset($vista)): ?>
          <?php $this->load->view($vista); ?>
        <?php endif; ?>
			</div> <!-- /col -->
		</div> <!-- /row -->

	</div>
</section>



<!-- Load js libs only when the page is loaded. -->
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootbox.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/services.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/alertify.min.js')?>"></script>
<!-- Custom template scripts -->
</body>
</html>
