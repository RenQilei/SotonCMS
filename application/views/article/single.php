<div class="row">
	<div class="col-sm-10" id="single-article">
		<div>
			<h1><?php echo $article->title; ?></h1>
		</div>
		<div class="row" id="info">
			<i class="fa fa-clock-o"></i>
			<?php
               	$date = date_create();
                date_timestamp_set($date, $article->datetime);
                echo date_format($date, 'd/m/Y H:i:s');
            ?>
            &nbsp;&nbsp;&nbsp;
			<i class="fa fa-tags"></i>
			<?php
				foreach ($tags as $item) {
					echo '<a href="';
					echo site_url('tag/allarticles/'.$item->tag);
					echo '">'.$item->name.'</a>&nbsp;';
				}
			?>
		</div>
		<div id="contents">
			<?php echo $article->contents; ?>
		</div>
	</div>
	<div class="col-sm-2">
		<div>
			<img src="<?php echo base_url(); ?>assets/img/ui-sam.jpg" class="img-circle" width="60">
		</div>
		<div>
			<a href="<?php echo site_url('writer/allarticles/'.$article->writer); ?>"><?php echo $article->name; ?></a>
		</div>
	</div>
</div>