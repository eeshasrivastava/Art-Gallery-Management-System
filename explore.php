<?php 
include 'admin/db_connect.php'; 
?>
<style>
#portfolio .img-fluid{
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
.vacancy-list{
cursor: pointer;
}
span.hightlight{
    background: yellow;
}
.carousel,.carousel-inner,.carousel-item{
    max-height: 30vh !important
}
header.masthead {
        min-height: 20vh !important;
        height: 20vh !important
    }
.row-items{
    position: relative;
}
.card-left{
    left:0;
}
.card-right{
    right:0;
}
.rtl{
    direction: rtl ;
}

</style>
        <header class="masthead">
        </header>
        <section id="list">
            <div class="container-fluid mt-3 pt-2">
                <h4 class="text-center">Arts In Our Gallery</h4>
                <hr class="divider">
                <div class="row-items">
                <div class="col-lg-12">
                <?php
                $cp ='offset-md-2';
                $rtl ='rtl';
                $fs = $conn->query("SELECT * FROM arts_fs where status = 0");
                while($row = $fs->fetch_assoc()):
                    $fs_aid[$row['art_id']] = $row;
                endwhile;
                $arts = $conn->query("SELECT a.*,u.name as aname FROM arts a inner join users u on u.id = a.artist_id where a.id not in (SELECT art_id FROM arts_fs where status = 1) and status = 1 order by rand()");
                while($row = $arts->fetch_assoc()):
                    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                    $desc = strtr(html_entity_decode($row['art_description']),$trans);
                    $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                    if($cp == 'offset-md-2'){
                        $cp = '';
                    }else{
                        $cp = 'offset-md-2';
                    }
                    if($rtl == 'rtl'){
                        $rtl = '';
                    }else{
                        $rtl = 'rtl';
                    }
                ?>
                <div class="row">
                <div class="col-md-10 <?php echo $cp ?>">
                <div class="card vacancy-list" data-id="<?php echo $row['id'] ?>">
                    <div class="card-body">
                        <div class="row <?php echo $rtl ?>">
                            <div class="col-md-4">
                                <div id="imagesCarousel_<?php echo $row['id'] ?>" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                              
                                    <?php 
                                        $images = array();
                                        $fpath = 'admin/assets/uploads/artist_'.$row['id'];
                                        $images= scandir($fpath);
                                        $i = 1;
                                        foreach($images as $k => $v):
                                            if(!in_array($v,array('.','..'))):
                                                $active = $i == 1 ? 'active' : '';
                                            
                                    ?>
                                         <div class="carousel-item <?php echo $active ?>">
                                          <img class="d-block w-100" src="<?php echo $fpath.'/'.$v ?>" alt="">
                                        </div>
                                    <?php
                                            $i++;
                                            else:
                                                unset($images[$v]);
                                            endif;
                                        endforeach;
                                    ?>
                                     <a class="carousel-control-prev" href="#imagesCarousel_<?php echo $row['id'] ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="carousel-control-next" href="#imagesCarousel_<?php echo $row['id'] ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-8">
                                <h3><b class="filter-txt"><?php echo ucwords($row['art_title']) ?></b></h3>
                                <span><small>Artist: <?php echo ucwords($row['aname']) ?></small></span>
                                <br>
                                <?php if(isset($fs_aid[$row['id']])): ?>
                                    <div <?php echo !empty($rtl) ? "style='direction:ltr'" : '' ?>>
                                        <span class="badge badge-success">For Sale</span>
                                        <span class="badge badge-secondary"><i class="fa fa-tag"></i> <?php echo number_format($fs_aid[$row['id']]['price'],2) ?></span>
                                        <span  class="badge badge-primary"><a href="javascript:void(0)" class="order_this text-white" data-attr="<?php echo $fs_aid[$row['id']]['id'] ?>">Buy</a></span>
                                    </div>
                                <?php endif; ?>
                                <hr>
                                <larger class="truncate filter-txt"><?php echo strip_tags($desc) ?></larger>
                                <br>
                                <hr class="divider"  style="max-width: calc(80%)">
                                <a class="btn btn-primary <?php echo empty($rtl) ? "float-right" : '' ?> read_more" href="index.php?page=view_art&id=<?php echo $row['id'] ?>">Read More</a>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                </div>
                </div>
                <?php endwhile; ?>
                </div>
                </div>
            </div>
        </section>


<script>
    // $('.card.vacancy-list').click(function(){
    //     location.href = "index.php?page=view_vacancy&id="+$(this).attr('data-id')
    // })
    $('#filter').keyup(function(e){
        var filter = $(this).val()

        $('.card.vacancy-list .filter-txt').each(function(){
            var txto = $(this).html();
            txt = txto
            if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                $(this).closest('.card').toggle(true)
            }else{
                $(this).closest('.card').toggle(false)
               
            }
        })
    })
</script>