<?php 

	// get photo id from the url
	$id = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : NULL; 
	
	
	require_once('../lib/phpFlickr.php');
	require_once('../config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	$f->enableCache("fs", "../cache");

	// Get info and size for this photo
	$photo_info = $f->photos_getInfo($id, $secret = NULL);
	$photo_size = $f->photos_getSizes($id, $secret = NULL);
	$photo_context = $f->photos_getContext($id);
	
	$sets_and_pools = $f->photos_getAllContexts($id);
	
	$this_photo_tags = $f->tags_getListPhoto($id);

	// Loop through array of sizes and construct $confirmed_sizes array.
	// Pick up $largest_size along the way.
	$last_item = $photo_size[0];
	foreach ($photo_size as $item) {
		if ($item["media"] == "photo") {
			$confirmed_sizes[] = $item;
			// update largest size if this one's bigger than the last
			if ($item["width"] > $last_item["width"]) {
				$largest_size = $item;
			} 
			$last_item = $item;
		}
	}
	
?>

<?php require_once("../inc/doc-head.php"); ?>

<body class="view">

	<?php require_once("../inc/header.php"); ?>
	
	<section class="main cf" role="main">
		
		<section class="item">
			<?php require_once("../inc/snippet-item.php"); ?>
		</section>


		<aside class="sidebar">
			<div class="photo-info">
				<div class="photo-title-desc">
					<?php if ($photo_info["photo"]["title"]) : ?><h2 class="photo-title"><?php echo $photo_info["photo"]["title"];?></h2><?php endif;?>
					<?php if ($photo_info["photo"]["description"]) : ?><p class="photo-desc"><?php echo $photo_info["photo"]["description"]; ?></p><?php endif;?>
				</div>
				<div class="meta">
					<?php date_default_timezone_set('UTC');?>
					<?php if ($config["show_date_taken"]) : ?><p class="photo-taken cf"><strong>Taken</strong> <span><?php echo date("F j, Y",(strtotime($photo_info["photo"]["dates"]["taken"])));?></span></p><?php endif; ?>
					<?php if ($config["show_date_uploaded"]) : ?><p class="photo-uploaded cf"><strong>Uploaded</strong> <span><?php echo date("F j, Y", ($photo_info["photo"]["dates"]["posted"]));?></span></p><?php endif; ?>
						<?php 
						if (isset($sets_and_pools["set"])) { ?>
							<p class="photo-sets cf">
								<strong>Sets</strong>
								<span>
								<?php
								$counter = 1;
								$total = count($sets_and_pools["set"]);
								foreach ($sets_and_pools["set"] as $item) { ?>
									<a href="<?php echo $root_url;?>sets/view/?<?php echo $item["id"];?>"><?php echo $item["title"];?></a><?php if ( $counter !== $total ) {echo "<br />";} ?>
								<?php $counter++; } ?>
								</span>
							</p>
							<?php } ?>
						
							
						<?php if ($this_photo_tags) { ?>
						<p class="photo-tags cf"><strong>Tags</strong> 
							<span>
							<?php
							$counter = 1;
							$total = count($this_photo_tags);
							foreach ($this_photo_tags as $tag) { 
									$tag_safe = str_replace(' ','',$tag["raw"]);
								?>
							<a href="<?php echo $root_url;?>tags/view/?<?php echo $tag_safe;?>"><?php echo $tag["raw"];?></a><?php if ( $counter !== $total ) {echo "<br />";} ?> 
								<?php $counter++; } ?>
							</span>
						</p>
						<?php } ?>
				
					<p class="view-on-flickr"><a class="button" href="http://flickr.com/photos/<?php echo $config["username"] ?>/<?php echo $photo_info["id"] ?>/">View on Flickr</a></p>
				
				</div> <!-- photo-info -->
				
			</div>
			
						
			
			<nav class="photo-prev-next">
			<ul>
			
				<?php if ($photo_context['nextphoto']['id']){ ?>
						<li class="newer">
							<a class="button" href="?<?php echo $photo_context['nextphoto']['id'];?>" title="<?php echo $photo_context['nextphoto']['title']; ?>">
								<img src="<?php echo $photo_context['nextphoto']['thumb']; ?>" alt="<?php echo $photo_context['nextphoto']['title']; ?>"/><br />
								<span>Newer</span> 
							
							</a>
						</li>
					<?php }  ?>
					
			<?php if ($photo_context['prevphoto']['id']){ ?>
				<li class="older">
					<a class="button" href="?<?php echo $photo_context['prevphoto']['id'];?>" title="<?php echo $photo_context['prevphoto']['title']; ?>">
						<img src="<?php echo $photo_context['prevphoto']['thumb'];?>" alt="<?php echo $photo_context['prevphoto']['title']; ?>" /><br />
						<span>Older</span> 
					</a>
				</li>
				<?php } ?>
			</ul>
			</nav>


			

		</aside> <!-- meta -->

</section> <!-- main  -->


<?php require_once ("../inc/footer.php"); ?>




</body>
</html>

