<?php 

	$this_page  = "sets";


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

		
		<?php // print_r($photosets); ?>
	
	
		<ul class="thumbs photosets cf">
		<?php
		
			foreach ($photosets["photoset"] as $set) { ?>

				<?php 
								
				$set_cover_url = "http://farm" . $set['farm'] . ".static.flickr.com/" . $set['server'] . "/" . $set["primary"] . "_" . $set['secret'] . "_m" . ".jpg"; ?>

				<li><a href="<?php echo $config["root_url"];?>/sets/view/?<?php echo $set["id"];?>">
					<img src="<?php echo $set_cover_url;?>" /></a><br />
					
					
					<h4><a href="<?php echo $config[root_url]; ?>/sets/view/?<?php echo $set["id"];?>"><?php echo $set["title"]; ?></a><br />
						<?php echo $set["photos"]; ?> photos, <?php echo $set["videos"]; ?> videos
					</h4>
					<p><?php echo $set["description"] ?></p>
				</li>
					
		 <?php } ?> 
		</ul><!-- thumbs -->



</section> <!-- main -->


</body>
</html>
