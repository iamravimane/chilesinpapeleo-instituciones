<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nav extends CIE_Controller {

	function __construct(){

		$this->isBackend = true;

		parent::__construct();
		
	}
	
	public function index() {
		$this->loadData('navs', $this->doctrine->em->getRepository('Entities\Nav')->findAll());

		$this->loadBlock('content', 'backend/nav/list', $this->data);

		$this->renderView('backend/layout');
	}

	public function add(){
		$this->load_nav_form(new Entities\Nav);
	}

	public function edit($navId){
		$this->load_nav_form($this->doctrine->em->find('Entities\Nav', $navId), site_url('backend/nav/update'), false);
	}

	public function update(){
		$this->store_nav($this->doctrine->em->find('Entities\Nav', $this->input->post('id', true)), false);
	}

	public function create(){
		$this->store_nav(new Entities\Nav);
	}

	/*
	* Nav Items
	*/

	public function deleteitem($navItemId){
		$navItem = $this->doctrine->em->find('Entities\NavItem', $navItemId);
		$nav = $this->findNav($navItem);

		$this->doctrine->em->remove($navItem);
		$this->doctrine->em->flush();

		redirect('backend/nav/edit/'.$nav->getId());
	}

	public function additem($navId){
		$nav = $this->doctrine->em->find('Entities\Nav', $navId);
		$navItem = new Entities\NavItem;
		$navItem->setNav($nav);
		$this->load_nav_item_form($nav, $navItem);
	}

	public function edititem($navItemId){
		$navItem = $this->doctrine->em->find('Entities\NavItem', $navItemId);
		$nav = $this->findNav($navItem);
		$this->load_nav_item_form($nav, $navItem, false);
	}

	public function updateitem(){
		$navItem = $this->doctrine->em->find('Entities\NavItem', $this->input->post('id', true));
		$nav = $this->findNav($navItem);
		$this->store_nav_item($nav, $navItem, false);
	}

	public function createitem(){
		$nav = $this->doctrine->em->find('Entities\Nav', $this->input->post('nav_id', true));
		$this->store_nav_item($nav, new Entities\NavItem);
	}

	/*
	* Helper to strore the nav on the database
	*/
	function store_nav($nav, $newNav = true){
		$alias = stringsHelper::sanitize_string($this->input->post('alias', true));
		if(!$alias)
			$alias = stringsHelper::sanitize_string($this->input->post('title', true));

		$nav->setTitle($this->input->post('title', true));
		$nav->setAlias($alias);

		if(!$nav->getTitle())
			$this->addMessage('Debe ingresar un título para el menú.');

		if($this->error){
			$this->load_nav_form($nav, $newNav);
		}else{
			$this->doctrine->em->persist($nav);
			$this->doctrine->em->flush();

			redirect('backend/nav');
		}
	}

	/*
	* Helper to find the nav of the item
	*/
	function findNav($item){
		while (!$item->getNav()) {
			$item = $item->getParent();
		}
		return $item->getNav();
	}

	/*
	* Helper to load the nav form view
	*/
	function load_nav_form($nav, $newNav = true){
		$this->loadData('formAction', $newNav?site_url('backend/nav/create'):site_url('backend/nav/update'));
		$this->loadData('nav', $nav);

		$this->loadBlock('content', 'backend/nav/form', $this->data);

		$this->renderView('backend/layout');
	}

	function store_nav_item($nav, $navItem, $newNavItem = true){
		
		$parentNavItem = $this->doctrine->em->find('Entities\NavItem', $this->input->post('parentNavItem', true));
		$page = $this->doctrine->em->find('Entities\Page', $this->input->post('page_id', true));

		$alias = stringsHelper::sanitize_string($this->input->post('alias', true));
		if(!$alias)
			$alias = stringsHelper::sanitize_string($this->input->post('title', true));

		$homepage = $this->input->post('homepage', true);
		if($homepage){
			$prevNavItemHome = $this->doctrine->em->getRepository('Entities\NavItem')->findOneBy(array('homepage'=>true))->setHomepage(false);
			if($prevNavItemHome != $navItem){
				$prevNavItemHome->setHomepage(false);
				$this->doctrine->em->persist($prevNavItemHome);
			}
		}

		$customurl = $this->input->post('customurl', true);

		if(!$customurl){
			$navItem->setPage($page);
			$navItem->setCustomurl(null);
		}else{
			$navItem->setPage(null);
			$navItem->setCustomurl($customurl);
		}

		$navItem->setTitle($this->input->post('title', true));
		$navItem->setAlias($alias);
		$navItem->setLayout($this->input->post('layout', true));
		$navItem->setHomepage($homepage);
		$navItem->setOrdering($this->input->post('ordering', true));

		if($parentNavItem){
			$navItem->setParent($parentNavItem);
			$navItem->setNav(null);
		}else{
			$navItem->setNav($nav);
			$navItem->setParent(null);
		}

		if(!$navItem->getTitle())
			$this->addMessage('Debe ingresar un título para el item.');

		if(!$navItem->getLayout() && $navItem->getPage())
			$this->addMessage('Debe seleccionar un layout para el menú cuando elige una pagina asociada.');

		if($this->error){
			$this->load_nav_item_form($nav, $navItem, $newNavItem);
		}else{
			$this->doctrine->em->persist($navItem);
			$this->doctrine->em->flush();

			redirect('backend/nav/edit/'.$nav->getId());
		}
	}

	/*
	* Helper to load the nav item form view
	*/
	function load_nav_item_form($nav, $navItem, $newNavItem = true){
		$this->loadData('formAction', $newNavItem?site_url('backend/nav/createitem'):site_url('backend/nav/updateitem'));
		$this->loadData('nav', $nav);
		$this->loadData('navItem', $navItem);

		$this->loadData('navItemList', $this->generateNavItemList($nav, $navItem));
		$this->loadData('layoutList', $this->generateLayoutList($this->getLayouts('page_layout'), $navItem->getLayout()));
		$this->loadData('pagesList', $this->generatePagesList($navItem));

		$this->loadBlock('content', 'backend/nav/item/form', $this->data);

		$this->renderView('backend/layout');
	}

	/*
	* HTML Helpers
	*/

	function generateLayoutList($layouts, $activeLayout){
		$list = '<select id="layout" name="layout"><option value="">- Seleccione -</option>';
		foreach ($layouts as $key => $layout) {
			$selected = $layout==$activeLayout ? ' selected="selected"':'';
			$list .= '<option'.$selected.' value="'.$layout.'">'.ucfirst($layout).'</option>';
		}
		$list .= '</select>';
		return $list;
	}

	function generateNavItemList($nav, $activeNavItem){
		$list = '<select id="parentNavItem" name="parentNavItem"><option value="">- Seleccione -</option>';

		foreach ($nav->getItems() as $key => $navItem) {
			$list .= $this->getNavItemTree($navItem, $activeNavItem);
		}

		$list .= '</select>';

		return $list;
	}

	public function generatePagesList($navItem){
		$pages = $this->doctrine->em->getRepository('Entities\Page')->findAll();
		$list = '<select id="page_id" name="page_id"><option value="">- Seleccione -</option>';
		foreach($pages as $page){
			$selected = $page == $navItem->getPage() ? ' selected="selected"' : '';
			$list .= '<option'.$selected.' value="'.$page->getId().'">'.$page->getTitle().'</option>';
		}
		$list .= '</select>';
		return $list;
	}

	function getNavItemTree($navItem, $activeNavItem, $level = 0){
		$selected = $activeNavItem->getParent() == $navItem ? ' selected="selected"' : '';
		$list = '<option'.$selected.' value="'.$navItem->getId().'">'.str_repeat('|--',$level).$navItem->getTitle().'</option>';
		if($navItem->getChildren()){
			foreach ($navItem->getChildren() as $key => $subItem) {
				$list .= $this->getNavItemTree($subItem, $activeNavItem, $level+1);
			}
		}
		return $list;
	}
}
