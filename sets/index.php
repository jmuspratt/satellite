<?php 

	$this_page  = "sets";

	// For paging the thumbnails, get the page we are on
	// if there isn't one - we are on page 1
	$page = isset($_GET['page']) ? $_GET['page'] : 1;

	require_once('../lib/phpFlickr.php');
	require_once('../config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	// phpFlickr needs a cache folder
	// in this case we have a writable folder on the root of our site, with permissions set to 777
	$f->enableCache("fs", "../cache");

	//returns an array
	$result = $f->people_findByUsername($config["username"]);

	// grab our unique user id from the $result array
	$nsid = $result["id"];


	// get photosets
	$photosets = $f->photosets_getList($nsid, NULL, NULL, 12, $page);

	// Some bits for paging
	$pages = $photos[photos][pages]; // returns total number of pages
	$total = $photos[photos][total]; // returns how many photos there are in total
	?>

<!doctype html>


<?php require_once("../inc/doc-head.php"); ?>

<body class="sets">
	
	<?php require_once("../inc/header.php"); ?>
	
	<section class="main" role="main">
	
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
	
		
		<?php // print_r($photosets); ?>
	
	
		<ul class="thumbs photosets cf">
		<?php
		
			foreach ($photosets["photoset"] as $set) { ?>

				<?php 
				
				$set_cover_url = "http://farm" . $set['farm'] . ".static.flickr.com/" . $set['server'] . "/" . $set[id] . "_" . $set['secret'] . "_m" . ".jpg"; ?>

				<li><a href="<?php echo $config[root_url];?>sets/view/?<?php echo $set["id"];?>">
					<img src="<?php echo $set_cover_url;?>" /></a><br />
					
					
					<h4><a href="<?php echo $config[root_url]; ?>sets/view/?<?php echo $set["id"];?>"><?php echo $set["title"]; ?></a><br />
						<?php echo $set["photos"]; ?> photos, <?php echo $set["videos"]; ?> videos
					</h4>
					<p><?php echo $set["description"] ?></p>
				</li>
					
		 <?php } ?> 
		</ul><!-- thumbs -->



</section> <!-- main -->


</body>
</html>
