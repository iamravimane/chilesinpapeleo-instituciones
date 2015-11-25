<div class="page-header">
    <h1>Menús <small></small></h1>
</div>
<a href="<?php echo site_url('backend/nav/add'); ?>" class="btn btn-primary">Nuevo Menú</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($navs as $key => $nav){ ?>
			<tr>
				<td><?php echo $nav->getId(); ?></td>
				<td><a href="<?php echo site_url('backend/nav/edit/'.$nav->getId()); ?>"><?php echo $nav->getTitle(); ?></a></td>
			</tr>	
		<?php } ?>
	</tbody>
</table>