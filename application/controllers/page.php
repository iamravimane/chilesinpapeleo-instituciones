<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CIE_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$navItem = $this->doctrine->em->getRepository('Entities\NavItem')->findOneBy(array('homepage'=>true));
		$this->view($navItem->getAlias());
	}

	public function view($alias = null){
		$navItem = $this->doctrine->em->getRepository('Entities\NavItem')->findOneBy(array('alias'=>$alias));
		$nav = $this->doctrine->em->find('Entities\Nav', 1);
		
		$this->loadData('navItem', $navItem);
		$this->loadData('page',$navItem->getPage());
		$this->loadData('nav', $nav);

		$this->setPageTitle($this->data['page']->getTitle());

		$this->checkAccess();

		$this->loadBlock('breadcrumb', 'nav/breadcrumb', $this->data);
		$this->loadBlock('side_menu', 'nav/side_menu', $this->data);
		$this->loadBlock('content', 'page_layout/'.$navItem->getLayout(), $this->data);

		$this->renderView('layout');
	}

}
