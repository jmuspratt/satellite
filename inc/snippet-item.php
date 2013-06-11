<?php
	$is_portrait = false; 
	// check Thumbnail size for portrait vs landscape
	if ( $confirmed_sizes[2]['width'] < $confirmed_sizes[2]['height'] ) {$is_portrait = true;}
	
	$is_video = false;
	if ($photoInfo['photo']['media'] == "video") {$is_video = true;}
	
?>

<?php if ($is_video) { 
	
		// Ideally we want the HD MP4 format (at index 13 (1280x720)). 
		// Sort array by [width] key Loop up through all available sizes and set $largest_video_size each time if it's a video and not a swf
		
		foreach ($photosize as $available_size) {
			if ( ($available_size["media"] == "video") && (strpos($available_size["source"], 'swf')== false) ) {
				$video_count = 0;
				
				// only overwrite largest_video_size if it's the first time through OR 
				// this one is bigger than the current largest.
				if ($count =  0 || ($available_size["width"] > $largest_video_size['width']) ) {
					$largest_video_size = $available_size;
				
				} // endif
			$video_count ++;
			
			} // endif
		} // end foreach
	?>
	
	<video controls preload="metadata" poster="<?php echo $photoUrl;?>" width="<?php echo $largest_video_size['width'];?>" height="<?php echo $largest_video_size['height'];?>">

		<source src="<?php echo $largest_video_size['source']; ?>" type="video/mp4" />
	</video>

	<p><a class="button" href="<?php echo $largest_video_size['source'];?>">Video File</a></p>
	
	<?php }	else {
		
		// Output Picturefill Image
	
	 ?>
		<a href="?<?php echo $context['prevphoto']['id'];?>">
				<span data-picture data-alt="<?php echo $photoInfo["photo"]["title"];?>">
				<span data-src="<?php echo $confirmed_sizes[3]["source"]; ?>"></span>
					
				<?php
				$exclude = array("Square", "Large Square", "Thumbnail", "Small", "Original");
				foreach ($confirmed_sizes as $confirmed_size) {
					if (!(in_array($confirmed_size["label"], $exclude))) { ?>
						<span class="<?php echo $confirmed_size["label"]; ?>" data-src="<?php echo $confirmed_size["source"]; ?>"  data-media="(min-width: <?php echo (round (.9 * $confirmed_size["width"])) ; ?>px)"></span>
				<?php }	}	?>
				
				
			<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
				<noscript>
					<img src="<?php echo $confirmed_sizes[3]["source"]; ?>" alt="<?php echo $photoInfo["photo"]["title"];?>">
				</noscript>
			</span>
		</a>
		
		
		
		<?php }?>
	
	
			
			<?php 
			// DEBUG
			
			echo "<code class=\"clear\">";
			print_r($photosize);
			echo "</code>";
			 ?>
			
