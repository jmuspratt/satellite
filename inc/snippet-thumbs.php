<?php


	$id = $photo['id'];
	$photoInfo = $f->photos_getInfo($id, $secret = NULL);

	$photosize = $f->photos_getSizes($id, $secret = NULL);
	$is_portrait = true; $is_video = false;
	if ($photosize[3]['width'] < $photosize['3']['height']) {$is_portrait = true;}
	if ($photoInfo['photo']['media'] == "video") {$is_video = true;}
?>
		   	 	<li class="<?php if ($is_portrait) {echo "portrait";}?> <?php if ( $is_video ) {echo "video";}?>">
			         <a href="<?php echo $config["root_url"];?>/view/?<?php echo $photo["id"];?>" title="<?php echo $photo["title"];?>">
						<img alt="<?php echo $photo["title"]?>" src="<?php echo $f->buildPhotoURL($photo, "Small");?>"/>
					 </a>
				</li>
				
				