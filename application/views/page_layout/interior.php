<?php $this->load->helper('htmlcontent') ?>
<h2>
	<?php echo $page->getTitle(); ?>
</h2>
<div class="page-content">
	<?php echo htmlcontentHelper::prepareContent($page->getContent()); ?>
</div>