	<?php 
	

	if ($photosize[14]['source']) { ?>
	
	<video controls>
		<source src="<?php echo ($photosize[14]['source']);?>"  type="video/mp4" />
	</video>

	<p><a class="button" href="<?php echo ($photosize[13]['source']);?>">Video File</a></p>
	
	<?php }	else { ?>
		<a href="?<?php echo $context['prevphoto']['id'];?>"><img src="<?php echo $photoUrl;?>" alt="<?php echo $photo["photo"]["title"];?>" /></a>
		
		<?php }?>
	