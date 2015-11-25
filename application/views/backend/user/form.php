<form action="<?php echo $formAction; ?>" class="form-horizontal" method="POST">
	<fieldset>
		<legend><?php echo $user->getId()?'Edición usuario ['.$user->getUserName().']':'Nuevo usuario'; ?></legend>
		<div class="control-group">
			<div class="control-label">
				<label for="fullname">Nombre Completo</label>
			</div>
			<div class="controls">
				<input type="text" name="fullname" id="fullname" class="input-xlarge" value="<?php echo $user->getFullName(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="username">Nombre de Usuario</label>
			</div>
			<div class="controls">
				<input type="text" name="username" id="username" class="input-xlarge" value="<?php echo $user->getUserName(); ?>">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="password">Clave</label>
			</div>
			<div class="controls">
				<input type="password" name="password" id="password" class="input-xlarge">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="password-confirm">Confirmar Clave</label>
			</div>
			<div class="controls">
				<input type="password" name="password-confirm" id="password-confirm" class="input-xlarge">
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label for="admin">Administrador <i class="icon-question-sign popover-icon" data-content="Los usuarios marcados como administrador pueden ingresar al backend del sitio." data-trigger="hover" title="Usuario administrador"></i></label>
			</div>
			<div class="controls">
				<input type="checkbox" value="1" id="admin" name="admin" <?php echo $user->getAdmin()?'checked="checked"':''; ?>>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary">Guardar</button>
			<a class="btn" href="<?php echo site_url('backend/user'); ?>">Cancelar</a>
		</div>
		<input type="hidden" name="id" id="id" value="<?php echo $user->getId(); ?>">
	</fieldset>
</form>