<?php
	$is_portrait = false; 
	if ( $largest_size['width'] < $largest_size['height'] ) {$is_portrait = true;}
	
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
	
	<?php }	else { ?>
		<a href="?<?php echo $context['prevphoto']['id'];?>"><img src="<?php echo $photoUrl;?>" alt="<?php echo $photoInfo["photo"]["title"];?>" /></a>
		<?php }?>
	
	
			
			<?php 
			// DEBUG
			
			// echo "<code class=\"clear\">";
			// print_r($photosize);
			// echo "</code>";
			 ?>
			
