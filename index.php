<?php 
	
	$this_page = "home";
	
	$page = isset($_GET['page']) ? $_GET['page'] : 1;

	require_once('lib/phpFlickr.php');
	require_once('config/config.php');

	$f = new phpFlickr($config["key"]);
	$f->enableCache("fs", "cache");

	$result = $f->people_findByUsername($config["username"]);
	$nsid = $result["id"];

	$photos = $f->people_getPublicPhotos($nsid, NULL, NULL, $config['photos_per_page'], $page);

	$pages = $photos["photos"]["pages"];
	$total = $photos["photos"]["total"];
	?>



<?php require_once("inc/doc-head.php"); ?>


<body class="home">
	
	<?php require_once("inc/header.php"); ?>
	
	<section class="main" role="main">
		
		<header class="page-header">
		<h1>Recent Photos</h1>
		<nav class="paging cf">
			<p>Page <?php echo $page;?> of <?php echo $pages; ?></p>
			<ul>
				<?php
				$prev = $page - 1; 
				$next = $page + 1; 

				if($page > 1) { ?>
			 	   <li class="newer"><a class="button" href="?page=<?php echo $prev; ?>"><span>Newer</span></a></li> 
				<?php } 
				// if not last page
				if($page != $pages) { ?>
		 	 	   <li class="older"><a class="button" href="?page=<?php echo $next; ?>"><span>Older</span></a></li> 
				<?php } ?>
				</ul>
		</nav> <!-- paging -->
		
	</header>
		
	
	
		<ul class="thumbs cf">
		<?php
			foreach ($photos['photos']['photo'] as $photo) {
				include ("inc/snippet-thumbs.php");
		 } ?>
		</ul><!-- thumbs -->

	</section> <!-- main -->

<?php require_once ("inc/footer.php"); ?>

</body>
</html>
