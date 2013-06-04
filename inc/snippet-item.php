<?php
?>

	<?php 
	

	if ($photosize[13]['source']) { ?>
	
	
	
	<video controls>
		<source src="<?php echo ($photosize[13]['source']);?>"  type="video/mp4" />
		<object width="640" height="360" type="application/x-shockwave-flash" data="__FLASH__.SWF">
			<param name="movie" value="__FLASH__.SWF" />
			<param name="flashvars" value="controlbar=over&amp;image=<?php echo $photoUrl;?>&amp;file=<?php echo ($photosize[13]['source']);?>" />
			<img src="<?php echo $photoUrl;?>" width="640" height="360" alt="__TITLE__"
			     title="No video playback capabilities, please download the video below" />
		</object>
	</video>
	<p class="button"><a href="<?php echo ($photosize[13]['source']);?>">Video File</a></p>
	
	
	<?php }	else { ?>
		<img src="<?php echo $photoUrl;?>" alt="<?php echo $photo["photo"]["title"];?>" />
		
		<?php }?>
	