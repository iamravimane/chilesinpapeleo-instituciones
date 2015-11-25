<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <!-- Data about Data, so meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width" />

        <title>Chile Sin Papeleo - <?php echo $data['page_title']; ?></title>

        <!-- Zhe fonts und styles -->
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/style.css') ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/print.css') ?>">

        <!-- Le Favicon and zhe lame apple stuffz -->
        <link rel="shortcut icon" href="<?php echo site_url('assets/img/favicon.ico') ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url('assets/img/apple-touch-icon-precomposed.png') ?>">

        <script src="<?php echo site_url('assets/js/libs/modernizr-2.5.3.min.js') ?>"></script>

        <script type="text/javascript">
            window.____aParams = {"gobabierto":"1","buscadore":"1","domain":"www.chilesinpapeleo.cl","icons":"1"};
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.modernizacion.cl/barra/js/barraEstado.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
    </head>
    <body>
        <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
        <!-- Zhe navigation -->
        <header class="container header">
            <div class="row">
                <!-- Logo y nombre de campaña -->
                <div class="span7">
                    <h1>
                        <a href="<?php echo site_url('') ?>"><img src="<?php echo site_url('assets/img/logo.png') ?>" alt="logo" id="logo">
                            Chile sin papeleo
                        </a></h1>
                </div>
                <div class="span5 tr">
                    <div class="row">
                        <div class="span3 iniciativa">Avance en digitalización</div>
                        <div class="span2"><a href="http://www.chileatiende.cl" target="_blank"><img src="<?php echo site_url('assets/img/logo_cha.png') ?>" alt="Logo ChileAtiende"></a></div>
                    </div>
                </div>
            </div>
            <!-- Menu & Search -->
            <nav class="span12">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="http://www.chilesinpapeleo.cl">Portada</a>
                    </li>
                    <li><a href="http://www.chilesinpapeleo.cl/paginas/ver/acerca-de-esta-campana">Acerca de esta campaña</a></li>
                    <li><a href="http://www.chilesinpapeleo.cl/paginas/ver/como-participar">Cómo participar</a></li>
                    <li><a href="http://www.chilesinpapeleo.cl/paginas/ver/conoce-tus-derechos-y-deberes">Conoce tus derechos</a></li>
                   	<li><a href="http://www.chilesinpapeleo.cl/paginas/ver/sigue-el-avance">Sigue el avance</a></li>
                   	<li class="active"><a href="<?php echo site_url(''); ?>">Instituciones</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
	    <article class="row-fluid">
	    	<?php if(isset($blocks['side_menu'])){ ?>
		    	<div class="span3">
		    		<div>
		    			<a class="thumbnail" href="http://soporte.chilesinpapeleo.cl/" target="_blank">
		    				<img src="<?php echo base_url('assets/img/banner-soporte.png'); ?>" alt="Consulta y solicitudes de soporte.">
		    			</a>
		    		</div>
		    		<br />
		    		<div class="well well-small side-menu">
			    		<div class="titulo-side-menu">Manual básico para la mejora y digitalización de trámites<hr></div>
			    		<?php echo $blocks['side_menu']; ?>
		    		</div>
		    	</div>
	    	<?php } ?>
	      <div class="<?php echo isset($blocks['side_menu'])?'span9':'span12'; ?>">
	      	<?php echo $blocks['breadcrumb']; ?>
	      	<?php echo $blocks['messages']; ?>
	      	<?php echo $blocks['content']; ?>
	      </div>
	    </article>
		</div>
    <footer class="footer">
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="span9">
                        <img src="<?php echo site_url('assets/img/logos.png') ?>" alt="">
                    </div>
                    <div class="span3">
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <h4>Unidad de Modernización y Gobierno Electrónico</h4>
                        <p>
                            Ministerio Secretaría General de la Presidencia<br />
                            Gobierno de Chile
                        </p>
                    </div>
                    <div class="span6 tr tb">
                        <p>
                            <a href="<?php echo site_url('/paginas/ver/politica-de-privacidad') ?>">Política de Privacidad</a> | <a href="<?php echo site_url('/paginas/ver/visualizadores-y-plugins') ?>">Visualizadores & Plug-ins</a> | <a href="http://creativecommons.org/licenses/by/3.0/cl/" target="_blank">CC</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo site_url('assets/js/libs/jquery-1.8.0.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/libs/bootstrap.min.js') ?>"></script>
    <script src="<?php echo site_url('assets/js/script.js') ?>"></script>

    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23675324-13']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</body>
</html>
