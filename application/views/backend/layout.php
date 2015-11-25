<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Chile sin Papeleo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css') ?>">
    <style type="text/css">
      body { padding-top: 60px; padding-bottom: 40px; }
      .sidebar-nav { padding: 9px 0; }
    </style>
    <link href="<?php echo site_url('assets/css/bootstrap-responsive.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/backend.css'); ?>">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo site_url('assets/ico/apple-touch-icon-57-precomposed.png'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/redactor/redactor.css') ?>" />
  </head>

  <body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="<?php echo site_url('backend'); ?>">Backend Instituciones</a>
					<div class="brand loged-user">
						Bienvenido <?php echo $data['user']->getFullName(); ?>
						<a href="<?php echo site_url('auth/logout'); ?>">Salir</a>
					</div>
				</div>
			</div>
		</div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">Administración</li>
							<li><a href="<?php echo site_url('backend/user'); ?>">Usuarios</a></li>
							<li class="nav-header">Contenido</li>
							<li><a href="<?php echo site_url('backend/nav'); ?>">Menús</a></li>
							<li><a href="<?php echo site_url('backend/page'); ?>">Paginas</a></li>
						</ul>
          </div>
        </div>
        <div class="span10">
					<?php echo $blocks['messages']; ?>
        	<?php echo $blocks['content']; ?>
        </div>
      </div>

      <hr>

      <footer>
          <p>Copyleft Modernización y Gobierno Electrónico 2012</p>
      </footer>

    </div>
    <script type="text/javascript" src="<?php echo site_url('assets/js/libs/jquery-1.8.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/js/libs/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/js/backend.js'); ?>"></script>
    <?php foreach ($scripts as $key => $script){ ?>
    <script type="text/javascript" src="<?php echo $script; ?>"></script>
    <?php } ?>
    <input type="hidden" value="<?php echo site_url('backend'); ?>" id="admin_url" name="admin_url">
    <input type="hidden" value="<?php echo site_url(); ?>" id="site_url" name="site_url">
  </body>
</html>


