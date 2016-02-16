<div class="banner">
	<h2>
		<a href="<?=base_url()?>paneladmin" title="index">Panel Admin</a>
		<i class="fa fa-angle-right"></i>
		<a href="<?=base_url()?>paneladmin/products" title="index"><span>Productos</span></a>
		<i class="fa fa-angle-right"></i>
		<span><?=$product->name?></span>
	</h2>
</div>
<div class="centro">
	<div class="row">
			<div class="col-xs-6 col-sm-4">
				<img src="<?=base_url()?>assets/img/wo.jpg" alt="imagen" class="img-product img-responsive">
				<div class="text"><a href="<?=base_url()?>paneladmin/product/<?=$product->id?>" class="btn btn-success"><p id="name"><span><?= $product->name?></span></p></a></div>
			</div>
	</div>
</div>