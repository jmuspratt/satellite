<?php 
	$this_page = "set-view";

	// get set id from the url
	$set_id = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : NULL; 


	require_once('../../lib/phpFlickr.php');
	require_once('../../config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	// phpFlickr needs a cache folder
	// in this case we have a writable folder on the root of our site, with permissions set to 777
	$f->enableCache("fs", "../../cache");

	// grab our unique user id from the $result array
	$nsid = $result["id"];

	$photos = $f->photosets_getPhotos($set_id, NULL, NULL, 999, $page);

	$set_info = $f->photosets_getInfo($set_id);

	?>

<!doctype html>


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
		
		<h1><?php echo $set_info["title"];?></h1>
		
		<h5><?php if ($photo_count > 0 ) : ?><?php echo $photo_count ?> photos<?php endif; ?><?php if ($show_comma) {echo ", ";}?><?php if ($vid_count > 0 ) : ?><?php echo $vid_count; ?> videos<?php endif; ?></h5>
			<p><?php echo $set_info["description"];?></p>
		
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
