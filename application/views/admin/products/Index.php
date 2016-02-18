<div class="banner">
	<h2>
		<a href="<?=base_url()?>paneladmin" title="index">Home</a>
		<i class="fa fa-angle-right"></i>
		<span>Productos</span>
	</h2>
</div>
<div class="centro">
	<div class="row">
		<?php foreach ($productos as $producto){?>
		<div class="col-xs-6 col-sm-4">
			<img src="<?=base_url()?>assets/img/wo.jpg" alt="imagen" class="img-product img-responsive">
			<div class="text"><a href="<?=base_url()?>paneladmin/product/<?=$producto->id?>" class="btn btn-success"><p id="name"><span><?= $producto->name?></span></p></a></div>
		</div>
		<?php }?>
	</div>
</div>