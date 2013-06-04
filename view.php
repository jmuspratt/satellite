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
	$context = $f->photos_getContext("$id");

	$photoUrl = $size['source'];

?>

<?php require_once("inc/doc-head.php"); ?>

<body class="view">

	<?php require_once("inc/header.php"); ?>
	
	<section class="main cf" role="main">
		
		<section class="item">
			<?php require_once("inc/snippet-item.php"); ?>
		</section>

		<section class="meta">
		<?php if ($context['prevphoto']['id']){ ?>
			<a href="?id=<?php echo $context['prevphoto']['id'];?>" title="<?php echo $context['prevphoto']['title']; ?>">
				<img src="<?php echo $context['prevphoto']['thumb'];?>" />
			</a>

			<?php } else { ?>
				<img src="images/no-img.png" alt="No Image" />
			<?php } ?>


		<?php if ($context['nextphoto']['id']){ ?>
			<a href="?id=<?php echo $context['nextphoto']['id'];?>" title="<?php echo $context['prevphoto']['title']; ?>">
				<img src="<?php echo $context['nextphoto']['thumb']; ?>" />
			</a>

			<?php } else { ?>
				<img src="images/no-img.png" alt="No Image" />
			<?php } ?>

			<p><a href="http://flickr.com/photos/<?php echo $config["username"] ?>/<?php echo $photo[id] ?>/">View on Flickr</a></p>

		</section> <!-- meta -->

</section> <!-- main  -->


<?php require_once ("inc/footer.php"); ?>




</body>
</html>

