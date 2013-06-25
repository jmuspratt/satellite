<?php 
	$this_page = "set-view";
	$set_id = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : NULL; 
	
	require_once('../../lib/phpFlickr.php');
	require_once('../../config/config.php');

	$f = new phpFlickr($config["key"]);
	$f->enableCache("fs", "../../cache");

	$nsid = $result["id"];
	$photos = $f->photosets_getPhotos($set_id, NULL, NULL, 999, $page);
	$set_info = $f->photosets_getInfo($set_id);

	?>

<?php require_once("../../inc/doc-head.php"); ?>



<body class="set-view">
	
	<?php require_once("../../inc/header.php"); ?>
	
	
	<section class="main" role="main">
		
		
		<?php 
		
		$photo_count = $set_info["count_photos"];
		$vid_count = $set_info["count_videos"];
		
		$show_comma = false;
		if ( ($photo_count > 0) && ($vid_count > 0) ) {$show_comma = true; }
		?>
		
		<header class="page-header">
			<h1><?php echo $set_info["title"];?></h1>
			<h5><?php if ($photo_count > 0 ) : ?><?php echo $photo_count ?> photos<?php endif; ?><?php if ($show_comma) {echo ", ";}?><?php if ($vid_count > 0 ) : ?><?php echo $vid_count; ?> videos<?php endif; ?></h5>
			<?php if ($set_info["description"]) {?>		<p class="set-desc"><?php echo $set_info["description"];?></p><?php } ?>
		</header>
		
		<ul class="thumbs cf">
		<?php
			foreach ($photos['photoset']['photo'] as $photo) {
				
				include ("../../inc/snippet-thumbs.php");
		 } ?>
		</ul><!-- thumbs -->



</section> <!-- main -->

<?php require_once ("../../inc/footer.php"); ?>

</body>
</html>
