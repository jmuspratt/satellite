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
		
		
		<?php // print_r ($set_info); ?>
		
		<h1><?php echo $set_info["title"];?></h1>
		<p><?php echo $set_info["count_photos"];?> Photos, <?php echo $set_info["count_videos"];?> Videos</p>
		<p><?php echo $set_info["description"];?></p>
		
		<ul class="thumbs cf">
		<?php
			foreach ($photos['photoset']['photo'] as $photo) {
				
				$id = $photo["id"];
				$photosize = $f->photos_getSizes($id, $secret = NULL);
				
				include ("../../inc/snippet-thumbs.php");
		 } ?>
		</ul><!-- thumbs -->



</section> <!-- main -->


</body>
</html>
