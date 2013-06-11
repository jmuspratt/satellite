<?php
	$id = $photo['id'];
	$photoInfo = $f->photos_getInfo($id, $secret = NULL);

	$photosize = $f->photos_getSizes($id, $secret = NULL);
	$is_portrait = false; 
	if ( $largest_size['width'] < $largest_size['height'] ) {$is_portrait = true;}
	
	$is_video = false;
	if ($photoInfo['photo']['media'] == "video") {$is_video = true;}

?>
		   	 	<li class="<?php if ($is_portrait) {echo "portrait";}?> <?php if ( $is_video ) {echo "video";}?>">
			         <a href="<?php echo $root_url;?>view/?<?php echo $photo["id"];?>" title="<?php echo $photo["title"];?>">
						<img alt="<?php echo $photo["title"]?>" src="<?php echo $f->buildPhotoURL($photo, "Small");?>"/>
					 </a>
				</li>
				
				