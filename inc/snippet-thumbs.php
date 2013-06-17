<?php
	$id = $photo['id'];
	$photo_info = $f->photos_getInfo($id, $secret = NULL);

	$photo_size = $f->photos_getSizes($id, $secret = NULL);
	$is_portrait = false; 
	if ( $largest_size['width'] < $largest_size['height'] ) {$is_portrait = true;}
	
	$is_video = false;
	if ($photo_info['photo']['media'] == "video") {$is_video = true;}

?>
		   	 	<li class="<?php if ($is_portrait) {echo "portrait";}?> <?php if ( $is_video ) {echo "video";}?>">
			         <a href="<?php echo $root_url;?>view/?<?php echo $photo["id"];?>" title="<?php echo $photo["title"];?>">
						<img alt="<?php echo $photo["title"]?>" src="<?php echo $f->buildPhotoURL($photo, "Small");?>"/>
					 </a>
				</li>
				
				