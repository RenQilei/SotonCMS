<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Home|SotonCMS</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
	</head>
	<body>
<div class="wrapper">
    <div class="box" style="background:url(<?php echo base_url(); ?>assets/img/soton_ecs.jpg);background-size:100%;">
        <div class="row">
          
            <!-- sidebar -->
            <div class="column col-sm-3" id="sidebar">
                <a class="logo" href="#">B</a>
                <ul class="nav">
                    <li class="active"><a href="#featured">Featured</a>
                    </li>
                    <li><a href="#stories">Stories</a>
                    </li>
                </ul>
                <ul class="nav hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="http://www.bootply.com"><h3>Basis</h3>Made with <i class="glyphicon glyphicon-heart-empty"></i> by Bootply</a>
                    </li>
                </ul>
            </div>
            <!-- /sidebar -->
          
            <!-- main -->
            <div class="column col-sm-9" id="main">
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->
                        
                        <div class="col-sm-12" id="featured">   
                          <div class="page-header text-muted">
                          Articles
                          </div> 
                        </div>
                        
                        <?php foreach($articlelist as $item) { ?>
                        <div class="row">    
                          <div class="col-sm-10">
                            <h3><?php echo $item->title; ?></h3>
                            <h4><span class="label label-default"><?php echo $item->contents; ?></span></h4>
                            <h4>
                            	<small class="text-muted">
                            	<?php
                            		$date = date_create();
                            		date_timestamp_set($date, $item->datetime);
                            		echo date_format($date, 'd/m/Y H:i:s');
                            	?>
                            		• <a href="#" class="text-muted">Read More</a>
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
                        
                        <div class="col-sm-12">
                          <div class="page-header text-muted divider">
                            Connect with Us
                          </div>
                        </div>
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                          </div>
                        </div>
                        
                        <hr>
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <p>
                            <a href="#" class="pull-right">©Copyright Inc.</a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                      <h3 class="text-center">
                      <a href="http://bootply.com/" target="ext">Made by Bootply</a>
                      </h3>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>
	<!-- script references -->
		<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>