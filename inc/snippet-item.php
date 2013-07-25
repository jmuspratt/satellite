<?php
	$is_portrait = false; 
	// check Thumbnail size for portrait vs landscape
	if ( $confirmed_sizes[2]['width'] < $confirmed_sizes[2]['height'] ) {$is_portrait = true;}
	
	$is_video = false;
	if ($photo_info['photo']['media'] == "video") {$is_video = true;}
	
?>

<?php if ($is_video) { 
	
		// Ideally we want the HD MP4 format (at index 13 (1280x720)). 
		// Loop up through all available sizes and set $largest_video_size each time if it's a video and not a swf
		
		foreach ($photo_size as $available_size) {
			if ( ($available_size["media"] == "video") && (strpos($available_size["source"], 'swf')== false) ) {
				$video_count = 0;
				// only overwrite $largest_video_size if it's the first time through OR 
				// this one is bigger than the current largest.
				if ($count =  0 || ($available_size["width"] > $largest_video_size['width']) ) {
					$largest_video_size = $available_size;
				} // endif
			$video_count ++;
			
			} // endif
		} // end foreach
	?>
	
	<video controls preload="metadata" poster="<?php echo $largest_size["source"];?>" width="<?php echo $largest_video_size['width'];?>" height="<?php echo $largest_video_size['height'];?>">

		<source src="<?php echo $largest_video_size['source']; ?>" type="video/mp4" />
	</video>

	<p><a class="button" href="<?php echo $largest_video_size['source'];?>">Video File</a></p>
	
	<?php }	else {
		
		// Output Picturefill Image
	
	 ?>
		<a class="pjax" href="?<?php echo $photo_context['prevphoto']['id'];?>">
				<span data-picture data-alt="<?php echo $photo_info["photo"]["title"];?>">
				<span data-src="<?php echo $confirmed_sizes[3]["source"]; ?>"></span>
					
				<?php
				$exclude = array("Square", "Large Square", "Thumbnail", "Small", "Original");
				
				// Set default "last size", which will be used in foreach loop to set media query (bigger image kicks in just as last image reaches 100% width)
				$last_size = $confirmed_sizes[3];
				// Output Picturefill <span>s for each confirmed size of the photo, excluding any of the sizes listed above
				foreach ($confirmed_sizes as $confirmed_size) {
					if (!(in_array($confirmed_size["label"], $exclude))) { ?>
						<span class="<?php echo $confirmed_size["label"]; ?>" data-src="<?php echo $confirmed_size["source"]; ?>"  data-media="(min-width: <?php echo (($last_size["width"])) ; ?>px)"></span>
						<?php $last_size = $confirmed_size; ?> 
				<?php }	}	?>
				
				
				<!-- IE8 and lower -->
					    <!--[if (lt IE 9) & (!IEMobile)]>
			               <span data-src="<?php echo $last_size["source"];?>"></span>
			           <![endif]-->
					
					
			<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
				<noscript>
					<img src="<?php echo $confirmed_sizes[3]["source"]; ?>" alt="<?php echo $photo_info["photo"]["title"];?>">
				</noscript>
			</span>
		</a>
		
		
		
		
		<?php }?>
	
	
			
			<?php 
			// DEBUG
			
			// echo "<code class=\"clear\">";
			// print_r($photo_size);
			// echo "</code>";
			 ?>
			
