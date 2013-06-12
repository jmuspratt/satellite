<?php 

	$this_page  = "tags";

	require_once('../lib/phpFlickr.php');
	require_once('../config/config.php');

	// Fire up the phpFlickr class
	$f = new phpFlickr($config["key"]);
	$f->enableCache("fs", "../cache");

	$result = $f->people_findByUsername($config["username"]);
	$nsid = $result["id"];

	$tag_list = $f->tags_getListUser($nsid);

	$pages = $photos["photos"]["pages"]; // returns total number of pages
	$total = $photos["photos"]["total"]; // returns how many photos there are in total
	?>

<?php require_once("../inc/doc-head.php"); ?>

<body class="sets">
	
	<?php require_once("../inc/header.php"); ?>
	
	<section class="main" role="main">
		
		<header class="page-header">
			<h1>Tags</h1>
			<h5><?php echo count($tag_list); ?> tags</h5>
		</header>
		
		<ul class="tag-list">
		<?php
		
			foreach ($tag_list as $tag) { 
				$tag_safe = str_replace(' ','',$tag);
				
				?>

				<li>
					<a href="view/?<?php echo $tag; ?>"><?php echo $tag; ?></a>
				</li>
					
		 <?php } ?> 
		</ul><!-- thumbs -->
		
</section> <!-- main -->

<?php require_once ("../inc/footer.php"); ?>

</body>
</html>
