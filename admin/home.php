<?php include 'db_connect.php' ?>
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
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
		height: 60vh !important;background: black;
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
</style>

<div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo "Welcome back ". $_SESSION['login_name']."!"  ?>
                    <hr>	

                    <div class="row">
                    <?php
                        $i = 1;
                        $images = array();
                          $fpath = 'assets/uploads';
                            $img= scandir($fpath);
                          foreach($img as $k => $v):
                              if(!in_array($v,array('.','..'))):
                                //   echo $v.'-'.(is_dir('assets/uploads/'.$v) ? true :false).'<br>';
                                  if(is_dir('assets/uploads/'.$v) == 1){
                                  $img[]= scandir('assets/uploads/'.$v);
                                  unset($img[$k]);
                              }else{
                                  $images[]= $v;
                                  
                              }
                                else:
                                unset($img[$k]);
                              endif;
                          endforeach;
                        // var_dump($img);
                        // exit;
                    ?>
                        <div id="imagesCarousel" class="carousel slide w-100" data-ride="carousel" data-interval="3000">
                            <div class="carousel-inner">
                                
                                <?php 
                                  
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
                </div>
            </div>      			
        </div>
    </div>
</div>
<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script>