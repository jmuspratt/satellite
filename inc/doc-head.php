<!doctype html>
<?php include ("functions.php"); ?>
<?php include ("config-process.php"); ?>
	<head>
		<title>
			<?php echo $config["gallery_title"]; ?>
			<?php if ($photo_info['photo']['title']) 	{echo " - " . $photo_info['photo']['title'];} ?>
			<?php if ($this_page == "sets") 					{echo " - Sets";} ?>
			<?php if ($this_page == "tags") 					{echo " - Tags";} ?>
			<?php if ($set_info["title"]) 						{echo " - " . $set_info["title"];} ?>
			<?php if ($tag_name) 											{echo " - " . $tag_name;} ?>
		</title>

		<meta charset="utf-8">
		<meta name="robots" content="all">
		<meta name="author" content="<?php echo $config['username'];?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		
		<!-- google webfonts -->
		<link href='http://fonts.googleapis.com/css?family=Cutive+Mono' rel='stylesheet' type='text/css'>

		<!-- css -->
		<link href="<?php echo $root_url; ?>/css/screen.css" rel="stylesheet" type="text/css">
	
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<link rel="stylesheet" type="text/css" media="all" href="#" />
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
			<script src="/js/respond.min.js"></script>
		<![endif]-->
			
			
			
			
			<?php if ($config["background"] || $config["links"]) : ?>
				<!-- user's custom colors -->
				<style>
				<?php if ($config["background"]) : ?>	body 	{background: <?php echo $config["background"];?>;} <?php endif; ?>
				<?php if ($config["links"]) : ?>				a			{color:	<?php echo $config["links"];?>;}<?php endif; ?>
				</style>
			<?php endif; ?>
			
			
			<!-- jQuery  -->
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
			<script>window.jQuery || document.write("<script src='<?php echo $root_url; ?>js/jquery-1.10.1.min.js'>\x3C/script>")</script>
			<!-- scripts -->
			<script src="<?php echo $root_url; ?>/js/jquery.cookie.js"></script>
			<script src="<?php echo $root_url; ?>/js/jquery.pjax.js"></script>
			<script src="<?php echo $root_url; ?>/js/picturefill.js"></script>
			<script src="<?php echo $root_url; ?>/js/scripts.js"></script>

	</head>