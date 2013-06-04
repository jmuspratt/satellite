<?php 

	// get photo id from the url
	$id = isset($_GET['id']) ? $_GET['id'] : NULL; 

	require_once('lib/phpFlickr.php');
	require_once('config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);

	$f->enableCache("fs", "cache");

	$photo = $f->photos_getInfo("$id", $secret = NULL);


	$photosize = $f->photos_getSizes("$id", $secret = NULL);
	$size = $photosize[8];

	//$allcontexts = $f->photos_getAllContexts("$id");
	$context = $f->photos_getContext("$id");

	$photoUrl = $size['source'];

?>

<?php require_once("inc/doc-head.php"); ?>



<body>

	<?php require_once("inc/header.php"); ?>
	
	<section class="main" role="main">
	
		<?php require_once("inc/snippet-item.php"); ?>


		<div class="context">
		<?php 
		if($context['prevphoto']['id']){echo"<a href=\"?id=".$context['prevphoto']['id']."\" title=\"Prev: ".$context['prevphoto']['title']."\"><img src=\"".$context['prevphoto']['thumb']."\" width=\"75\" height=\"75\" /></a>";

		} else {

		echo"<img src=\"/noimg.png\" width=\"75\" height=\"75\" alt=\"No photo\" class=\"noimg\" />";
		};


		if($context['nextphoto']['id']){echo "<a href=\"?id=".$context['nextphoto']['id']."\" title=\"Next: ".$context['nextphoto']['title']."\"><img src=\"".$context['nextphoto']['thumb']."\" width=\"75\" height=\"75\" /></a>";
		} else {
		echo"<img src=\"/noimg.png\" width=\"75\" height=\"75\" alt=\"No photo\" class=\"noimg\" />";
		};

		//////////// CONTEXT

		echo"<p>";
		if($context['prevphoto']['id']){echo"<a href=\"?id=".$context['prevphoto']['id']."\" title=\"Prev: ".$context['prevphoto']['title']."\">&laquo; Prev</a>";} else {echo"&laquo; Prev";};
		echo" | ";
		if($context['nextphoto']['id']){echo"<a href=\"?id=".$context['nextphoto']['id']."\" title=\"Next: ".$context['nextphoto']['title']."\">Next &raquo;</a>";}else {echo"Next &raquo;";};
		echo"</p>";
		?>
		</div><!-- end context -->
		
		<p><a href="http://flickr.com/photos/<?php echo $config["username"] ?>/<?php echo $photo[id] ?>/">View '<?php echo $photo[title] ?>' on Flickr</a> &raquo;</p>


</section> <!-- main  -->




</body>
</html>

