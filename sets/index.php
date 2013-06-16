<?php 

	$this_page  = "sets";

	require_once('../lib/phpFlickr.php');
	require_once('../config/config.php');

	$f = new phpFlickr($config["key"]);
	$f->enableCache("fs", "../cache");

	$result = $f->people_findByUsername($config["username"]);
	$nsid = $result["id"];

	$photosets = $f->photosets_getList($nsid, NULL, NULL, 999, $page);

	$pages = $photos["photos"]["pages"]; // returns total number of pages
	$total = $photos["photos"]["total"]; // returns how many photos there are in total
	
	?>

<?php require_once("../inc/doc-head.php"); ?>

<body class="sets">
	
	<?php require_once("../inc/header.php"); ?>
	
	<section class="main" role="main">

		<header class="page-header">
			<h1>Sets</h1>
			<h5><?php echo $photosets["total"]; ?> sets</h5>
		</header>
	
		<ul class="thumbs photosets cf">
		<?php
		
			foreach ($photosets["photoset"] as $set) { ?>

				<?php 
				$photo_count = $set["photos"];
				$vid_count = $set["videos"];
				
				$show_comma = false;
				if ( ($photo_count > 0) && ($vid_count > 0) ) {$show_comma = true; }

								
				$set_cover_url = "http://farm" . $set['farm'] . ".static.flickr.com/" . $set['server'] . "/" . $set["primary"] . "_" . $set['secret'] . "_m" . ".jpg"; ?>

				<li>
					<a href="<?php echo $root_url;?>sets/view/?<?php echo $set["id"];?>">
						<img src="<?php echo $set_cover_url;?>" alt="<?php echo $set["title"]; ?>" />
						<div class="set-text">
							<h4><?php echo $set["title"]; ?></h4>
							<h5><?php if ($photo_count > 0 ) : ?><?php echo $photo_count ?> photos<?php endif; ?><?php if ($show_comma) {echo ", ";}?><?php if ($vid_count > 0 ) : ?><?php echo $vid_count; ?> videos<?php endif; ?></h5>
						</div>
					</a>
				</li>
					
		 <?php } ?> 
		</ul><!-- thumbs -->



</section> <!-- main -->

<?php require_once ("../inc/footer.php"); ?>

</body>
</html>
