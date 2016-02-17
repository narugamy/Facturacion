<div class="banner">
	<h2>
		<a href="<?=base_url()?>" title="index">Home</a>
	</h2>
</div>
<div class="centro">
	<table class="table table-striped">
		<thead>
		<th>Nombre</th>
		<th>Unidades</th>
		<th>Precio</th>
		<th>Acciones</th>
		</thead>
		<tbody>
			<?php foreach($products as $product){?>
				<tr>
					<?=form_open(base_url()."paneluser/product/add",['class'=>'form','id'=>'form'])?>
					<td><?=$product['name']?></td>
					<td><?=$product['number']?></td>
					<td><?= form_input(['class'=>'form-control','placeholder'=>'Cantidad','id'=>'stock','name'=>'number','type'=>'number','min'=>'0','step'=>'1','value'=>$product['price']])?></td>
					<td>
						<a href="<?=base_url()?>paneluser/carrito/<?=$product['id']?>" class="btn btn-warning boton" id="html"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
						<a href="<?=base_url()?>paneluser/carrito/<?=$product['id']?>" class="btn btn-danger boton" id="json" onclick="return confirm('¿Seguro que desea Eliminarlo?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
					<?=form_close()?>
				</tr>
			<?php }?>
		</tbody>
	</table>
</div>