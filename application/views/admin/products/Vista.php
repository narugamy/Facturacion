<div class="banner">
	<h2>
		<a href="<?=base_url()?>paneladmin" title="index">Home</a>
		<i class="fa fa-angle-right"></i>
		<a href="<?=base_url()?>paneladmin/products" title="index"><span>Productos</span></a>
		<i class="fa fa-angle-right"></i>
		<span><?=$product->name?></span>
	</h2>
</div>
<div class="centro">
	<div class="row">
		<div class="col-xs-6 col-sm-3">
			<img src="<?=base_url()?>assets/img/wo.jpg" alt="imagen" class="img-product img-responsive">
			<div class="text"><p id="name" class="text-center"><span><?= $product->name?></span></p></div>
		</div>
		<div class="col-xs-6 col-sm-9">
			<div class="description text-justify">
				<?=$product->description?>
			</div>	
			<div class="price">
				Precio: <?=$product->price?>
			</div>
			<?= form_open(base_url()."paneladmin/product/add",['class'=>'form','id'=>'form'])?>
				<div class="form-group numberitem">
					<?php  echo form_label('Cantidad','number');
					echo form_input(['class'=>'form-control','placeholder'=>'Cantidad','id'=>'stock','name'=>'number','type'=>'number','min'=>'0','step'=>'1']);?>
				</div>
				<div class="form-group botonenviar">
					<button type="submit" class="btn btn-success">Agregar a Carrito</button>
				</div>
			<?= form_close()?>
		</div>
	</div>
</div>