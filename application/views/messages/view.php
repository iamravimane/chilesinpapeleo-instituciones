<?php if($messages){ ?>
	<?php foreach ($messages as $key => $message){ ?>
		<div class="alert alert-<?php echo $message['type']; ?>">
			<?php echo $message['message']; ?>
		</div>
	<?php } ?>
<?php } ?>