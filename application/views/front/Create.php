
		<?= form_open(base_url().'create',['id'=>'login','name'=>'form','class'=>'login'])?>
		<div class="form-group">
			<label for="name">Nombre:</label>
			<?=form_input(['name'=>'name','class'=>'name form-control','id'=>'name','placeholder'=>'Nombre','required'=>''])?>
		</div>
		<div class="form-group">
				<div id="nam"></div>
		</div>
		<div class="form-group">
			<label for="apellidos">Apellidos:</label>
			<?=form_input(['name'=>'apellidos','class'=>'apellidos form-control','id'=>'apellidos','placeholder'=>'Apellidos','required'=>''])?>
		</div>
		<div class="form-group">
				<div id="ape"></div>
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<?=form_input(['name'=>'email','class'=>'email form-control','id'=>'email','placeholder'=>'Correo Electronico','required'=>'','type'=>'email'])?>
		</div>
		<div class="form-group">
				<div id="ema"></div>
		</div>
		<div class="form-group">
			<label for="password">Password:</label>
			<?=form_input(['name'=>'password','class'=>'password form-control','id'=>'password','placeholder'=>'Contraseña','required'=>'','type'=>'password'])?>
		</div>
		<div class="form-group">
				<div id="pas"></div>
		</div>
		<div class="form-group">
			<label for="date">Fecha de Nacimiento:</label>
			<?=form_input(['name'=>'date','class'=>'date form-control','id'=>'date','required'=>'','type'=>'date'])?>
		</div>
		<div class="form-group">
				<div id="pas"></div>
		</div>
		<div class="form-group">
				<div id="gen"></div>
		</div>
		<div class="form-group">
			<?=form_button(['content'=>'Logear','class'=>'btn btn-success','type'=>'submit'])?>
		</div>
		<?= form_close()?>
