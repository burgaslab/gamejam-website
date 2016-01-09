<!DOCTYPE html>
<html lang="en">
<head>
<title>Burgas Game Jam | започваме на 23 януари в Морското казино</title>
	<?php require_once("partial/head.php"); ?>
	<link href="<?= $this->path->base ?>resource/css/lightbox.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<?php require_once("partial/header.php"); ?>
		<div class="row demo-row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="inner-container trans-black">
				<?php if (is_dir($imgdir)) { ?>
					<div class="row demo-row">						
						<?php  
						$count = count($photos);  //The total count of all the images
						//Echo out the images 
						for($i = 0; $i < $count; $i++){
							$image = $this->path->base . $imgdir . $photos[$i];
							$thumb = $this->path->base . $imgthumbsdir . $photos[$i];
							
							echo "
							<div class='col-xs-12 col-sm-3 col-md-3 col-lg-3' style='text-align: center;'>
							<a href='".$image."' data-lightbox='all-set' data-title='". $photos[$i] ."'>
								<img src='".$thumb."' alt='". $photos[$i] ."' title='". $photos[$i] ."' style='max-width: 300px; max-height: 150px'>
							</a>
							</div>";
						} 
						?>
						
		
					</div>	
				<?php } ?>					
					
				</div>
			</div>			
		</div>
		<?php require_once("partial/footer.php"); ?>
	</div>
	<?php require_once("partial/javascript.php"); ?>	
	<script src="<?= $this->path->base ?>resource/js/lightbox.js"></script>
</body>
</html>
