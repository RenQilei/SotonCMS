<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
    	<h3><i class="fa fa-angle-right"></i> Add New User</h3>
    	<div class="row mt">
        	<div class="col-lg-12">
        		<div class="form-panel">
        			<form class="form-horizontal style-form" method="post" action="<?php echo site_url("user/adduser"); ?>">
                    	<div class="form-group">
                        	<label class="col-sm-2 col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="col-sm-2 col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="col-sm-2 col-sm-2 control-label">Default Password</label>
                            <div class="col-sm-10">
                            	<input type="password" class="form-control" name="password"">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label class="col-sm-2 col-sm-2 control-label">Level</label>
                            <div class="col-sm-10">
                            	<select class="form-control" name="level">
									<option value="1" selected="selected">Writer</option>
									<option value="2">Editor</option>
									<option value="3">Admin</option>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-sm-4">
                            	<button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                        
        			</form>
        		</div>
          	</div>
        </div>
	</section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
<!--main content end-->