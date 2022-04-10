<?php include 'admin/db_connect.php' ?>
<?php
if(isset($_GET['id'])){
$qry = $conn->query("SELECT e.*,u.name as aname FROM events e inner join users u on u.id = e.artist_id where e.id= ".$_GET['id']);
foreach($qry->fetch_array() as $k => $val){
	$$k=$val;
}
}
?>
<style type="text/css">
	.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 40vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
	#imagesCarousel{
		width: calc(70%);
		margin: auto;
	}
	header.masthead {
		min-height: 20vh !important;
		height: 20vh !important
	}
</style>
<header class="masthead">

</header>
<section class="mt-4">
<div class="container mt-4">
	<div class="col-lg-12">
		<div class="card pt-4 pb-4">
			<div class="card-body">
					<div class="col-md-12">
							<div id="imagesCarousel" class="carousel slide" data-ride="carousel">
							  <div class="carousel-inner">
							  
						<?php 
					  		$images = array();
					  		if(isset($id)){
					  			$fpath = 'admin/assets/uploads/event_'.$id;
					  			$images= scandir($fpath);
					  		}
					  		$i = 1;
					  		foreach($images as $k => $v):
					  			if(!in_array($v,array('.','..'))):
					  				$active = $i == 1 ? 'active' : '';
			  					
					  	?>
					  		 <div class="carousel-item <?php echo $active ?>">
						      <img class="img-fluid" src="<?php echo $fpath.'/'.$v ?>" alt="">
						    </div>
					  	<?php
					  			$i++;
					  			else:
			  						unset($images[$v]);
					  			endif;
				  			endforeach;
					  	?>
					  	 <a class="carousel-control-prev" href="#imagesCarousel" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#imagesCarousel" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
					  		</div>
						</div>
					</div>
					<div class="col-md-12" id="content">
						<h4 class="text-center"><b><?php echo ucwords($title) ?></b></h4>
						<hr class="divider">
						<center><small><?php echo ucwords($aname) ?></small></center>
						<br>
						<p><b><i class="fa fa-calendar"></i> <?php echo date("F d, Y h:i A",strtotime($event_datetime)) ?></b></p>
						<?php echo html_entity_decode($content); ?>
					</div>
			</div>
		</div>
	</div>
</div>
</section>
<script>
	$('.imgs img').click(function(){
		viewer_modal($(this).attr('src'))
	})
	$('.carousel').carousel()
</script>
