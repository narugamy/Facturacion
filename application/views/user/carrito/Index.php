<div class="banner">
	<h2>
		<a href="<?=base_url()?>paneluser" title="index">Home</a>
		<i class="fa fa-angle-right"></i>
		<span>Carrito</span>

	</h2>
</div>
<div class="centro">
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead>
			<th>Nombre</th>
			<th>Unidades</th>
			<th>Precio unitario</th>
			<th>Precio total</th>
			<th>Acciones</th>
			</thead>
			<tbody>
                <?php if(!empty($products)){?>
				    <?php foreach($products as $product){?>
                        <tr>
                            <?=form_open(base_url()."paneluser/carrito/update",['class'=>'form','id'=>'form'])?>
                                <td><?=$product['name']?></td>
                                <td><?=form_input(['class'=>'form-control','placeholder'=>'Cantidad','id'=>'number','name'=>'number','type'=>'number','min'=>'0','step'=>'1','value'=>$product['number']])?></td>
                                <td><?=($product['price']/$product['number'])?></td>
                                <td><?=$product['price']?><?= form_input(['name'=>'id','type'=>'hidden','value'=>$product['id']])?></td>
                                <td>
                                    <button class="btn btn-warning boton" type="submit">Update</button>
                                    <a href="<?=base_url()?>paneluser/carrito/delete/<?=$product['id']?>" class="btn btn-danger boton" id="json" onclick="return confirm('¿Seguro que desea Eliminarlo?')"><span class="fa fa-times" aria-hidden="true"></span></a>
                                </td>
                            <?=form_close()?>
                        </tr>
				    <?php }?>
                <?php }?>
			</tbody>
        </table>
        <div>
            <a href="<?=base_url()?>paneluser/guardar" class="btn btn-success boton" id="json" onclick="return confirm('¿Seguro que desea enviar el pedido?')">Enviar Pedido</a>
        </div>
    </div>
</div>