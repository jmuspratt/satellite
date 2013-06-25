	<header class="primary cf">
	
		<nav class="primary">
			<h1<?php if ($this_page == "home") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>"><?php echo $config["gallery_title"]; ?></a></h1>
			<ul>
				<li<?php if ($this_page == "set-view" || $this_page == "sets") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>sets/">Sets</a></li><li<?php if ($this_page == "tag-view" || $this_page == "tags") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>tags/">Tags</a></li>
			</ul>
		</nav>
	
		<p class="mode-trigger"><a title="Toggle Viewing Mode (v)" href="#" class=""></a></p>
	
	</header>