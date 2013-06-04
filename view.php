<?php 

	// get photo id from the url
	$id = isset($_GET['id']) ? $_GET['id'] : NULL; 

	require_once('lib/phpFlickr.php');
	require_once('config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	$f->enableCache("fs", "cache");

	$photo = $f->photos_getInfo($id, $secret = NULL);
	


	$photosize = $f->photos_getSizes($id, $secret = NULL);
	$size = $photosize[8];

	//$allcontexts = $f->photos_getAllContexts("$id");
	$context = $f->photos_getContext($id);

	$photoUrl = $size['source'];

?>

<?php require_once("inc/doc-head.php"); ?>

<body class="view">

	<?php require_once("inc/header.php"); ?>
	
	<section class="main cf" role="main">
		
		<?php
			
			
		?>
		
		
		<section class="item">
			<?php require_once("inc/snippet-item.php"); ?>
		</section>



		<section class="meta">
			
			<div class="photo-title-desc">
				<h2 class="photo-title"><?php echo $photo["photo"]["title"];?></h2>
				<p class="photo-desc"><?php echo $photo["photo"]["description"]; ?></p>
				<p><a href="http://flickr.com/photos/<?php echo $config["username"] ?>/<?php echo $photo[id] ?>/">View on Flickr</a></p>
			
			</div>
			
			
			
			
			
			<nav class="photo-prev-next">
			<ul>
			<?php if ($context['prevphoto']['id']){ ?>
				<li>
					<a href="?id=<?php echo $context['prevphoto']['id'];?>" title="<?php echo $context['prevphoto']['title']; ?>">
						<img src="<?php echo $context['prevphoto']['thumb'];?>" />
					</a>
				</li>

				<?php } else { ?>
					<li><img src="images/no-img.png" alt="No Image" /></li>
				<?php } ?>


			<?php if ($context['nextphoto']['id']){ ?>
					<li>
						<a href="?id=<?php echo $context['nextphoto']['id'];?>" title="<?php echo $context['prevphoto']['title']; ?>">
							<img src="<?php echo $context['nextphoto']['thumb']; ?>" />
						</a>
					</li>

				<?php } else { ?>
					<li><img src="images/no-img.png" alt="No Image" /></li>
				<?php } ?>
				</ul>
			</nav>


		</section> <!-- meta -->

</section> <!-- main  -->


<?php require_once ("inc/footer.php"); ?>




</body>
</html>

