<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CIE_Controller {

	function __construct(){
		parent::__construct();
	}
	
	public function index() {

		$this->loadBlock('content', 'auth/login_form');
		$this->setPageTitle('Login');
		$this->renderView('layout');

	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->doctrine->em->getRepository('Entities\User')->findOneBy(array('username' => $username));

		$entitySerializer = new \Doctrine\EntitySerializer($this->doctrine->em);
		$user = $entitySerializer->toArray($user);

		if( $this->authenticate($user, $password) ){

			unset($user['password']);

			$this->session->set_userdata('user', $user);

			redirect(base64_decode($this->input->post('refering_url')));

		}else{

			$this->addMessage('Usuario o contraseña incorrecta.');

			redirect('/auth');

		}

	}

	public function authenticate($user, $password){
		$validUser = false;

		if(!is_null($user)){
			$pass_data = explode(':', $user['password']);
			$validUser = ($pass_data[0] === sha1($password.$pass_data[1]));
		}

		return $validUser;
	}

	public function logout(){
		$this->session->unset_userdata('user');

		redirect('');
	}
}
