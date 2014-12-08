                        <!-- content -->
                        
                        <!--
<div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">
                          Articles
                          </div> 
                        </div>
-->
                        <div id="right">
                        <?php foreach($articlelist as $item) { ?>
                        <div class="row">    
                          <div class="col-sm-10">
                            <h3><a href="<?php echo site_url('article/showarticle/'.$item->id); ?>"><?php echo $item->title; ?></a></h3>
                            <div class="" id="abstract"><?php echo strip_tags(substr($item->contents, 0, 200)); ?></div>
                            <h4>
                            	<small class="text-muted">
                            	<?php
                            		$date = date_create();
                            		date_timestamp_set($date, $item->datetime);
                            		echo date_format($date, 'd/m/Y H:i:s');
                            	?>
                            		• <a href="<?php echo site_url('article/showarticle/'.$item->id); ?>" class="text-muted">Read More</a>
                            	</small>
                            </h4>
                          </div>
                          <div class="col-sm-2">
                            <a href="#" class="pull-right"><img src="<?php echo base_url(); ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a>
                          </div> 
                        </div>
                        <div class="row divider">    
                           <div class="col-sm-12"><hr></div>
                        </div>
                        <?php } ?>
                        </div>
