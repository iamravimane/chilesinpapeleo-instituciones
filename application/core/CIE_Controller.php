<?php
	/**
	* 
	*/
	class CIE_Controller extends CI_Controller{

		var $user = null;
		
		var $blocks = array(
				'breadcrumb' => '',
				'breadcrumb' => '',
				'content' => ''
			);
		var $data = array(
				'page_title' => 'Home'
			);
		var $scripts = array();

		var $messages = array();
		
		var $isBackend = false;

		function __construct(){
		
			parent::__construct();


			$sessionUser = $this->session->userdata('user');

			if($sessionUser){

				$this->user = $this->doctrine->em->find('Entities\User', $sessionUser['id']);
				$this->loadData('user', $this->user);

				if($this->isBackend && !$this->user->getAdmin()){
					$this->addMessage('Debe ser administrador para ingresar esta sección del sitio.');
					$this->session->set_userdata('refering_url', current_url());
					redirect('');
				}

			}else{

				if($this->isBackend){
					$this->addMessage('Debe iniciar sesión para poder ingresar.');
					$this->session->set_userdata('refering_url', current_url());
					redirect('auth');
				}

			}

		}

		public function addMessage($message, $type = 'error'){
			if($type == 'error')
				$this->error = true;
			$this->messages[] = array('type' => $type, 'message' => $message);
			$this->session->set_userdata('messages', $this->messages);
		}

		public function loadMessages(){
			$this->messages = $this->session->userdata('messages');
			$this->loadBlock('messages', 'messages/view', array('messages' => $this->messages));
			$this->session->unset_userdata('messages');
		}

		public function loadData($name, $data){
			$this->data[$name] = $data;
		}

		public function loadBlock($position = 'content', $view, $data = null){
			$this->blocks[$position] = $this->load->view($view, $data, true);
		}

		public function loadScript($name, $url){
			$this->scripts[$name] = $url;
		}

		public function setPageTitle($page_title){
			$this->loadData('page_title', $page_title);
		}

		public function isAjax(){
			if(!$this->input->is_ajax_request()){
				echo 'Only ajax requests allowed.';
				return false;
			}else{
				return true;
			}
		}

		public function renderView($view){
			$this->loadMessages();
			
			$data['blocks'] = $this->blocks;
			$data['data'] = $this->data;
			$data['scripts'] = $this->scripts;

			$this->load->view($view, $data);
		}

		public function checkAccess(){
			if($this->data['page']->getRestricted() && !$this->user){
				$this->addMessage('Debe iniciar sesión para poder ingresar.');
				redirect('auth');
			}
		}

		public function getLayouts($path){
			$this->load->helper('file');
			$layouts = get_filenames('./application/views/'.$path.'/');
			foreach ($layouts as &$layout) {
				$layout = str_replace('.php', '', $layout);
			}
			return $layouts;
		}
	}
?>