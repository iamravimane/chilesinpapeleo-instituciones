<div class="span4">
	&nbsp;
</div>
<div class="span4">
	<form id="form-login" class="form" action="<?php echo site_url('auth/login'); ?>" method="POST">
		<fieldset>
			<div class="control-group">
				<div class="control-label">
					<label for="">Usuario</label>
				</div>
				<div class="controls">
					<input type="text" value="" id="username" name="username">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<label for="">Clave</label>
				</div>
				<div class="controls">
					<input type="password" value="" id="password" name="password">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-primary">Acceder</button>
				</div>
			</div>
			<input type="hidden" id="refering_url" name="refering_url" value="<?php echo base64_encode($this->session->userdata('refering_url')); ?>">
		</fieldset>
	</form>
</div>