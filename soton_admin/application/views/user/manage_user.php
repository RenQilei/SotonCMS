<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
    	<h3><i class="fa fa-angle-right"></i> Manage User</h3>
    	<div class="row mt">
        	<div class="col-lg-12">
        		<div class="content-panel">
                	<section id="unseen">
                    	<table class="table table-bordered table-striped table-condensed">
                        	<thead>
                            	<tr>
                                	<th>NO.</th>
									<th>NAME</th>
									<th class="numeric">EMAIL</th>
									<th class="numeric">LEVEL</th>
									<th class="numeric">MANAGE</th>
								</tr>
							</thead>
                            <tbody>
                            <?php foreach ($userlist as $item) { ?>
                            	<tr>
                            		<td><?php echo $item->id; ?></td>
                            		<td class="numeric"><?php echo $item->name; ?></td>
                            		<td class="numeric"><?php echo $item->email; ?></td>
                            		<td class="numeric"><?php echo $item->title; ?></td>
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
	</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
<!--main content end-->