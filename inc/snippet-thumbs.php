<?php

?>
		   	 	<li <?php if ( $photosize[13]['source'] ) {echo "class=\"video\"";}?>>
			         <a href="<?php echo $config[root_url];?>/view/?<?php echo $photo[id];?>" title="<?php echo $photo[title];?>">
						<img alt="<?php echo $photo[title]?>" src="<?php echo $f->buildPhotoURL($photo, "Small");?>"/>
					 </a>
				</li>