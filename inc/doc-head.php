<!doctype html>

	<meta charset="utf-8">
	<meta name="robots" content="all">
	<meta name="author" content="<?php echo $config['username'];?>">

	<head>

	<title><?php echo $config["gallery_title"]; ?> <?php if ($photo['title']) {echo ": " . $photo['title'];} ?></title>

	</head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />


	<link href="css/layout.css" rel="stylesheet" type="text/css">
	<link href="css/type.css" rel="stylesheet" type="text/css">
	
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="#" />
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="/js/respond.min.js"></script>
	<![endif]-->
		
		<!-- jQuery  -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src='/js/jquery.min.js'>\x3C/script>")</script>
		<script src="/js/respond.min.js"></script>


		<!-- scripts -->
		<script src="/js/scripts.js"></script>

</head>