	<header class="primary">
		<h1><a href="<?php echo $config['root_url'];?>"><?php echo $config["gallery_title"]; ?></a></h1>
	
		<nav class="primary">
			<ul>
				<li<?php if ($this_page == "home") { ?> class="current" <?php } ?>><a href="<?php echo $config['root_url'];?>">Home</a></li>
				<li<?php if ($this_page == "set-view" || $this_page == "sets") { ?> class="current" <?php } ?>><a href="<?php echo $config['root_url'];?>/sets">Sets</a></li>
			</ul>
		</nav>
	
	</header>