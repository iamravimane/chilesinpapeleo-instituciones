<ul class="breadcrumb">
	<li>
		<a href="<?php echo site_url(''); ?>">Inicio</a>
	</li>
	<?php echo generateBreadcrumb($navItem); ?>
</ul>
<?php
	function generateBreadcrumb($item){
		$breadcrumbString = '';

		while ($item->getParent()) {
			$breadcrumb[] = getBreadcrumbItem($item);
			$item = $item->getParent();
		}

		if($item->getHomepage())
			return '';
		
		$breadcrumb[] = getBreadcrumbItem($item);

		$breadcrumb = array_reverse($breadcrumb);

		foreach ($breadcrumb as $key => $item) {
			$breadcrumbString .= '<li>';
			$breadcrumbString .= '<span class="divider">/</span>';
			if($key < count($breadcrumb)-1){
				$breadcrumbString .= '<a href="'.$item['link'].'">'.$item['title'].'</a>';
			}else{
				$breadcrumbString .= $item['title'];
			}
			$breadcrumbString .= '</li>';
		}

		return $breadcrumbString;
	}
	function getBreadcrumbItem($item){
		$itemUrl = $item->getPage()?site_url('page/view/'.$item->getAlias()):$item->getCustomurl();
		return array('link' => $itemUrl, 'title' => $item->getTitle());
	}
?>