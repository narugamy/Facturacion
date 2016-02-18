<div class="banner">
	<h2>
		<a href="<?= base_url() ?>paneladmin" title="index">Home</a>
		<i class="fa fa-angle-right"></i>
		<span>Productos</span>
	</h2>
</div>
<div class="centro">
	<div class="row">
		<?= form_open_multipart(base_url()."paneladmin/product/crear",['class'=>'form','id'=>'form'])?>
		<div class="form-group">
			<?php  echo form_label('Nombre','name');
			echo form_input(['class'=>'form-control','placeholder'=>'Nombre del Producto','id'=>'name','name'=>'name']);?>
		</div>
		<div class="form-group">
			<?php  echo form_label('Descripcion','description');
			echo form_textarea(['class'=>'form-control','placeholder'=>'Precio del Producto','id'=>'description','name'=>'description']);?>
		</div>
		<div class="form-group">
			<?php  echo form_label('Precio','price');
			echo form_input(['class'=>'form-control','placeholder'=>'Precio del Producto','id'=>'price','name'=>'price','type'=>'number','min'=>'0','step'=>'0.1']);?>
		</div>
		<div class="form-group">
			<?php  echo form_label('Stock','stock');
			echo form_input(['class'=>'form-control','placeholder'=>'Stock del Producto','id'=>'stock','name'=>'stock','type'=>'number','min'=>'0','step'=>'1']);?>
		</div>
		<div class="form-group">
				<?php  echo form_label('Foto del Producto','image_id');
			echo form_input(['class'=>'form-control','placeholder'=>'Foto del Producto','id'=>'image_id','name'=>'image_id','type'=>'file']);?>
		</div>
		<div class="form-group">
			<?= form_checkbox(['name'=>'check','id'=>'check','value'=>'inhabilitar','checked'=> false])?>inabilitar imagen
		</div>
		<div class="form-group">
			<?= form_button(['content'=>'Registrar','type'=>'submit','class'=>'btn btn-primary boton-form'])?>
		</div>
	</div>
</div>