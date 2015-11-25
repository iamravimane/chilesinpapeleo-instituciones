<div class="page-header">
    <h1>Usuarios <small></small></h1>
</div>
<a href="<?php echo site_url('backend/user/add'); ?>" class="btn btn-primary">Nuevo Usuario</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $user){ ?>
			<tr>
				<td><?php echo $user->getId(); ?></td>
				<td><a href="<?php echo site_url('backend/user/edit/'.$user->getId()); ?>"><?php echo $user->getFullName(); ?></a></td>
				<td><?php echo $user->getAdmin()?'Administrador':''; ?></td>
			</tr>	
		<?php } ?>
	</tbody>
</table>