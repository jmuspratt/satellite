	<?php 
	

	if ($photosize[13]['source']) { ?>
	
	<video controls>
		<source src="<?php echo ($photosize[13]['source']);?>"  type="video/mp4" />
	</video>

	<p><a class="button" href="<?php echo ($photosize[13]['source']);?>">Video File</a></p>
	
	<?php }	else { ?>
		<img src="<?php echo $photoUrl;?>" alt="<?php echo $photo["photo"]["title"];?>" />
		
		<?php }?>
	