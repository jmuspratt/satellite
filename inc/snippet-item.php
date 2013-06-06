<?php
	$is_portrait = true; $is_video = false;
	if ($photosize[3]['width'] < $photosize['3']['height']) {$is_portrait = true;}
	if ($photoInfo['photo']['media'] == "video") {$is_video = true;}
	
?>

<?php if ($is_video) { ?>
	
	<video controls>
		<?php
		// Ideally we want the HD MP4 format (at index 13 (1280x720)). 
		// If it's not there fall back then 10 (640x360)
		if 	(isset($photosize[13])) {$video_source = $photosize[13]['source'];}
														else 	{$video_source = $photosize[10]['source'];}
		?>
		<source src="<?php echo $video_source; ?>" type="video/mp4" />
	</video>



	<p><a class="button" href="<?php echo ($photosize[13]['source']);?>">Video File</a></p>
	
	<?php }	else { ?>
		<a href="?<?php echo $context['prevphoto']['id'];?>"><img src="<?php echo $photoUrl;?>" alt="<?php echo $photoInfo["photo"]["title"];?>" /></a>
		<?php }?>
	
