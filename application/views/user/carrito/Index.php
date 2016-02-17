<div class="banner">
	<h2>
		<a href="<?=base_url()?>" title="index">Home</a>
	</h2>
</div>
<div class="centro">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
			<th>Nombre</th>
			<th>Unidades</th>
			<th>Precio unitario</th>
			<th>Precio total</th>
			<th>Acciones</th>
			</thead>
			<tbody>
				<?php foreach($products as $product){?>
					<tr>
						<?=form_open(base_url()."paneluser/carrito/update",['class'=>'form','id'=>'form'])?>
							<td><?=$product['name']?></td>
							<td><?=form_input(['class'=>'form-control','placeholder'=>'Cantidad','id'=>'number','name'=>'number','type'=>'number','min'=>'0','step'=>'1','value'=>$product['number']])?></td>
							<td><?=($product['price']/$product['number'])?></td>
							<td><?=$product['price']?><?= form_input(['name'=>'id','type'=>'hidden','value'=>$product['id']])?></td>
							<td>
								<button class="btn btn-warning boton" type="submit">Update</button>
								<a href="<?=base_url()?>paneluser/carrito/<?=$product['id']?>" class="btn btn-danger boton" id="json" onclick="return confirm('¿Seguro que desea Eliminarlo?')"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
							</td>
						<?=form_close()?>
					</tr>

				<?php }?>
			</tbody>
		</table>
	</div>
</div>