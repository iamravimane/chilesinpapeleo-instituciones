<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CIE_Controller {

	function __construct(){

		$this->isBackend = true;

		parent::__construct();
		
	}
	
	public function index() {
		$this->renderView('backend/layout');
	}
}
