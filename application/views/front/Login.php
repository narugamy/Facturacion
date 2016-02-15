
		<?= form_open(base_url().'login',['id'=>'login','name'=>'form','class'=>'login'])?>
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
				<div id="gen"></div>
		</div>
		<div class="form-group">
			<?=form_button(['content'=>'Logear','class'=>'btn btn-primary btn-lg1 btn-block','type'=>'submit'])?>
		</div>
		<div class="form-group">
			<a href="<?=base_url()?>create" class="btn btn-primary btn-lg1 btn-block">Registrar</a>
		</div>
		<?= form_close()?>