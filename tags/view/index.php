<?php 
	$this_page = "tag-view";
	$tag_name = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : NULL; 

	require_once('../../lib/phpFlickr.php');
	require_once('../../config/config.php');

	$f = new phpFlickr($config["key"]);
	$f->enableCache("fs", "../../cache");

	$result = $f->people_findByUsername($config["username"]);
	$nsid = $result["id"];

	$photos_with_this_tag = $f->photos_search(array(
		"tags"=>$tag_name, 
		"tag_mode"=>"any",
		"user_id" => $nsid
		));

	?>

<?php require_once("../../inc/doc-head.php"); ?>


<body class="set-view">
	
	<?php require_once("../../inc/header.php"); ?>
	
	
	<section class="main" role="main">
		
		<header class="page-header">
			<h1>Tag: <?php echo $tag_name;?></h1>
			<h5><?php echo $photos_with_this_tag["total"];?> items</h5>
		</header>
		
		<ul class="thumbs cf">
		<?php
			foreach ($photos_with_this_tag['photo'] as $photo) {
				include ("../../inc/snippet-thumbs.php");
		 } 
		 ?>
		</ul><!-- thumbs -->



</section> <!-- main -->

<?php require_once ("../../inc/footer.php"); ?>

</body>
</html>
