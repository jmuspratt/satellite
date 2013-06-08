<?php 

	// get photo id from the url
	$id = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : NULL; 
	
	
	require_once('../lib/phpFlickr.php');
	require_once('../config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	$f->enableCache("fs", "../cache");

	// Get info and size for this photo
	$photoInfo = $f->photos_getInfo($id, $secret = NULL);
	$photosize = $f->photos_getSizes($id, $secret = NULL);
	
	
	// get highest resolution image in this order of availability
	// Large (1024), Medium (800), Medium (640), Medium (500), Small (320), Small (240)

	if ($photosize[3] && ($photosize[3]["media"] == "photo") ) {	$largest_size = $photosize[3]; }
	if ($photosize[4] && ($photosize[4]["media"] == "photo") ) {	$largest_size = $photosize[4]; }
	if ($photosize[5] && ($photosize[5]["media"] == "photo") ) {	$largest_size = $photosize[5]; }
	if ($photosize[6] && ($photosize[6]["media"] == "photo") ) {	$largest_size = $photosize[6]; }
	if ($photosize[7] && ($photosize[7]["media"] == "photo") ) {	$largest_size = $photosize[7]; }
	if ($photosize[8] && ($photosize[8]["media"] == "photo") ) {	$largest_size = $photosize[8]; }

	$size = $largest_size;

	//$allcontexts = $f->photos_getAllContexts("$id");
	$context = $f->photos_getContext($id);

	$photoUrl = $size['source'];

?>

<?php require_once("../inc/doc-head.php"); ?>

<body class="view">

	<?php require_once("../inc/header.php"); ?>
	
	<section class="main cf" role="main">
		
		<p class="wide-trigger"><a href="#" class="button">Wide Format</a></p>
		
		<section class="item">
			<?php require_once("../inc/snippet-item.php"); ?>
		</section>




		<aside class="sidebar">
			
			<div class="photo-title-desc">
				<?php if ($photoInfo["photo"]["title"]) : ?><h2 class="photo-title"><?php echo $photoInfo["photo"]["title"];?></h2><?php endif;?>
				<?php if ($photoInfo["photo"]["description"]) : ?><p class="photo-desc"><?php echo $photoInfo["photo"]["description"]; ?></p><?php endif;?>
				
			</div>
			
			
			
			<div class="meta">
			
					<?php date_default_timezone_set('UTC');?>
				
					<?php if ($config["show_date_taken"]) : ?><p><strong>Taken:</strong> <?php echo date("F j, Y",(strtotime($photoInfo["photo"]["dates"]["taken"])));?><p><?php endif; ?>
					<?php if ($config["show_date_uploaded"]) : ?><p><strong>Uploaded:</strong> <?php echo date("F j, Y", ($photoInfo["photo"]["dates"]["posted"]));?></p><?php endif; ?>
				
					<p><a class="button" href="http://flickr.com/photos/<?php echo $config["username"] ?>/<?php echo $photoInfo["id"] ?>/">View on Flickr</a></p>
				
			</div>
			
			
			
			<nav class="photo-prev-next">
			<ul>
			
				<?php if ($context['nextphoto']['id']){ ?>
						<li class="newer">
							<a href="?<?php echo $context['nextphoto']['id'];?>" title="<?php echo $context['nextphoto']['title']; ?>">
								<img src="<?php echo $context['nextphoto']['thumb']; ?>" /><br />
								<span>Newer</span> 
							
							</a>
						</li>

					<?php } else { ?>
						<li class="newer"><a href="#"><img src="<?php echo $config["root_url"];?>/images/no-img.png" alt="No Image" /><br />
							<span>Newer</span> 
						</a></li>
					<?php } ?>
					
					
					
			<?php if ($context['prevphoto']['id']){ ?>
				<li class="older">
					<a href="?<?php echo $context['prevphoto']['id'];?>" title="<?php echo $context['prevphoto']['title']; ?>">
						<img src="<?php echo $context['prevphoto']['thumb'];?>" /><br />
						<span>Older</span> 
					</a>
				</li>

				<?php } else { ?>
					<li class="older"><a href="#"><img src="<?php echo $config["root_url"];?>/images/no-img.png" alt="No Image" /><br />
						<span>Older</span>
					</a></li>
				<?php } ?>



				
				
				</ul>
			</nav>


			

		</aside> <!-- meta -->

</section> <!-- main  -->


<?php require_once ("../inc/footer.php"); ?>




</body>
</html>

