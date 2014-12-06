<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3><i class="fa fa-angle-right"></i> Add New Article</h3>
    	<div class="row mt">
        	<div class="col-lg-12">
        		<div class="form-panel">
        			<form class="form-horizontal style-form" method="post" action="<?php echo site_url('article/addarticle'); ?>">
                    	<div class="form-group">
                        	<label class="col-sm-2 col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                            	<textarea type="text" class="form-control" name="contents">
                            	</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tags</label>
                            <div class="col-sm-10">
                            	<input data-role="tagsinput" type="text" class="form-control" name="tags">
                            </div>
                        </div>
                        </div>
						<div class="form-group">
                            <div class="col-sm-4">
                            	<button type="submit" class="btn btn-success">POST</button>
                            </div>
                        </div>
                        
        			</form>
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