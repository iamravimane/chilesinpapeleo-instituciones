<ul class="nav nav-list">
	<?php
	foreach ($nav->getItems() as $key => $item){
		echo getItemNavTree($item, $navItem->getId(), 0);
	}
	?>
</ul>
<?php
	function getItemNavTree($item, $selectedId, $level){
		$active = $item->getId()==$selectedId;
		$itemUrl = $item->getPage()?site_url('page/view/'.$item->getAlias()):$item->getCustomurl();

		$_li = '<li'.($active?' class="active"':'').'>';
		if(!$active && $itemUrl){
			$_li .= '<a href="'.$itemUrl.'">'.$item->getTitle().'</a>';
		}else{
			$_li .= $item->getTitle();
		}
		$childrens = $item->getChildren();
		if($childrens->count()){
			$_li .= '<ul>';
			foreach ($childrens as $key => $subItem) {
				$_li .= getItemNavTree($subItem, $selectedId, $level+1);
			}
			$_li .= '</ul>';
		}
		$_li .= '</li>';
		if($level == 0){
			$_li .= '<li class="divider"></li>';
		}

		return $_li;
	}
?>