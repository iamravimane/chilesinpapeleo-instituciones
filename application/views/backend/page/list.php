<div class="page-header">
    <h1>Paginas <small></small></h1>
</div>
<a href="<?php echo site_url('backend/page/add'); ?>" class="btn btn-primary">Nueva Página</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Titulo</th>
			<th>Acceso</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pages as $key => $page){ ?>
			<tr id="page-<?php echo $page->getId(); ?>">
				<td><?php echo $page->getId(); ?></td>
				<td><a href="<?php echo site_url('backend/page/edit/'.$page->getId()); ?>"><?php echo $page->getTitle(); ?></a></td>
				<td>
					<?php if($page->getRestricted()){ ?>
						<button data-ajax-command="toggleRestricted" data-ajax-controller="page" data-ajax-params="?id=<?php echo $page->getId(); ?>" class="btn btn-mini btn-warning">
							<i class="icon-ban-circle"></i>
							<span>Restringido</span>
						</button>
					<?php }else{ ?>
						<button data-ajax-command="toggleRestricted" data-ajax-controller="page" data-ajax-params="?id=<?php echo $page->getId(); ?>" class="btn btn-mini btn-success">
							<i class="icon-ok-circle"></i>
							<span>Público</span>
						</button>
					<?php } ?>
				</td>
				<td>
					<a href="<?php echo site_url('backend/page/delete/'.$page->getId()); ?>" class="btn btn-danger btn-small">
						Eliminar
					</a>
				</td>
			</tr>	
		<?php } ?>
	</tbody>
</table>