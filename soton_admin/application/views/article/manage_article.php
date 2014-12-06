<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3><i class="fa fa-angle-right"></i> Manage Article</h3>
    	<div class="row mt">
        	<div class="col-lg-12">
        		<div class="content-panel">
                	<section id="unseen">
                    	<table class="table table-bordered table-striped table-condensed">
                        	<thead>
                            	<tr>
                                	<th>NO.</th>
									<th>TITLE</th>
									<th class="numeric">TIME</th>
									<th class="numeric">MANAGE</th>
								</tr>
							</thead>
                            <tbody>
                            <?php foreach ($articlelist as $item) { ?>
                            	<tr>
                            		<td><?php echo $item->id; ?></td>
                            		<td class="numeric"><?php echo $item->title; ?></td>
                            		<td class="numeric">
                            		<?php
                            			$date = date_create();
                            			date_timestamp_set($date, $item->datetime);
                            			echo date_format($date, 'd/m/Y H:i:s');
                            		?>
                            		</td>
                            		<td class="numeric">
	                            		<a href="">update</a>
	                            		&nbsp;&nbsp;
	                            		<a href="">delete</a>
                            		</td>
                            	</tr>
                            <?php } ?>
                            </tbody>
						</table>
					</section>
				</div>
          	</div>
        </div>
        <div class="row mt">
        	<div class="col-lg-12">
          	</div>
        </div>
	</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
<!--main content end-->