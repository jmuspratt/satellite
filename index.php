<?php 
	
	$this_page = "home";
	
	// For paging the thumbnails, get the page we are on
	// if there isn't one - we are on page 1
	$page = isset($_GET['page']) ? $_GET['page'] : 1;

	require_once('lib/phpFlickr.php');
	require_once('config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	// phpFlickr needs a cache folder
	// in this case we have a writable folder on the root of our site, with permissions set to 777
	$f->enableCache("fs", "cache");

	//returns an array
	$result = $f->people_findByUsername($config["username"]);

	// grab our unique user id from the $result array
	$nsid = $result["id"];

	// Get the user's public photos and show $config['photos_per_page'] per page
	//$page at the end specifies which page to start on, that's the page number ($page) that we got at the start
	$photos = $f->people_getPublicPhotos($nsid, NULL, NULL, $config['photos_per_page'], $page);

	// Some bits for paging
	$pages = $photos["photos"]["pages"]; // returns total number of pages
	$total = $photos["photos"]["total"]; // returns how many photos there are in total
	?>



<?php require_once("inc/doc-head.php"); ?>


<body class="home">
	
	
	<?php require_once("inc/header.php"); ?>
	
	<section class="main" role="main">
	
		<nav class="paging cf">
			<p><strong>Page <?php echo $page;?> of <?php echo $pages; ?></strong></p>
			<ul>
				<?php
				$prev = $page - 1; 
				$next = $page + 1; 

				if($page > 1) { ?>
			 	   <li class="newer"><a class="button" href="?page=<?php echo $prev; ?>"><span>Newer</span></a></li> 
				<?php } 
				// if not last page
				if($page != $pages) { ?>
		 	 	   <li class="older"><a class="button" href="?page=<?php echo $next; ?>"><span>Older</span></a></li> 
				<?php } ?>
				</ul>
		</nav> <!-- paging -->
	
	
		<ul class="thumbs cf">
		<?php
			foreach ($photos['photos']['photo'] as $photo) {
				include ("inc/snippet-thumbs.php");
		 } ?>
		</ul><!-- thumbs -->

	</section> <!-- main -->

<?php require_once ("inc/footer.php"); ?>

</body>
</html>
