	<header class="primary cf">
	
		<nav class="primary">
			<h1><a href="<?php echo $root_url;?>"><?php echo $config["gallery_title"]; ?></a></h1>
			<ul>
				<li<?php if ($this_page == "home") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>">Home</a></li>
				<li<?php if ($this_page == "set-view" || $this_page == "sets") { ?> class="current" <?php } ?>><a href="<?php echo $root_url;?>/sets">Sets</a></li>
			</ul>
		</nav>
	
		<p class="wide-trigger"><a href="#" class="button">Wide Format</a></p>
	
	</header>