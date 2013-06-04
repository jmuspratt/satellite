<?php

?>
		   	 	<li>
			         <a href="/view/?<?php echo $photo[id];?>" title="<?php echo $photo[title];?>">
						<img alt="<?php echo $photo[title]?>" src="<?php echo $f->buildPhotoURL($photo, "Small");?>"/>
					 </a>
				</li>