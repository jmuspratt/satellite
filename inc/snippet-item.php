<?php
?>
<div class="item">
	<img src="<?php echo $photoUrl;?>" alt="<?php echo $photo[title];?>" />
	<h2><?php echo $photo["title"];?></h2>
	<p><a href="http://flickr.com/photos/<?php echo $config["username"];?>/<?php echo $id;?>">View on Flickr</a>


		<?php
// The photo's description
echo"<p>$photo[description]</p>";
?>

</div><!-- end item -->
