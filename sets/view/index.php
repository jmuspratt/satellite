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



	$photos = $f->photosets_getPhotos($set_id, NULL, NULL, $config['photos_per_page'], $page);

	$set_info = $f->photosets_getInfo($set_id);

	// Some bits for paging
	$pages = $photos[photos][pages]; // returns total number of pages
	$total = $photos[photos][total]; // returns how many photos there are in total
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
		
		<nav class="paging cf">
			
			<p><strong>Page <?php echo $page;?> of <?php echo $pages; ?></strong> (<?php echo $total; ?> photos in the gallery)</p>
			
			<ul>
				<?php
				// Some simple paging code to add Prev/Next to scroll through the thumbnails
				$back = $page - 1; 
				$next = $page + 1; 

				if($page > 1) { ?>
			 	   <li><a class="button" href="?page=<?php echo $back; ?>">Previous Page</strong></a></li> 
				<?php } 
				// if not last page
				if($page != $pages) { ?>
		 	 	   <li><a class="button" href="?page=<?php echo $next; ?>">Next Page</strong></a></li> 
				<?php } ?>
				</ul>
		

		</nav> <!-- paging -->
	
	
	
		<h2>Set Name here</h2>
		
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
