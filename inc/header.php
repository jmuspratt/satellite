	<header class="primary cf">
	<?php 
	// debug
	// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	?>	
		<nav class="primary">
			<h1<?php if ($this_page == "home") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>"><?php echo $config["gallery_title"]; ?></a></h1>
			<ul>
				<?php if ($config["show_sets"]) { ?><li<?php if ($this_page == "set-view" || $this_page == "sets") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>sets/">Sets</a></li><?php } ?>
				<?php if ($config["show_tags"]) { ?><li<?php if ($this_page == "tag-view" || $this_page == "tags") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>tags/">Tags</a></li><?php } ?>
			</ul>
		</nav>
	
		<p class="mode-trigger"><a title="Toggle Viewing Mode (v)" href="#" class=""></a></p>
	
	</header>