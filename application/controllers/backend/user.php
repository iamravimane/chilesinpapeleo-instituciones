<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CIE_Controller {

	function __construct(){

		$this->isBackend = true;

		parent::__construct();
		
	}
	
	public function index() {
		$this->loadData('users', $this->doctrine->em->getRepository('Entities\User')->findAll());

		$this->loadBlock('content', 'backend/user/list', $this->data);

		$this->renderView('backend/layout');
	}

	public function edit($userId){
		$this->load_user_form($this->doctrine->em->find('Entities\User', $userId), false);
	}

	public function add(){
		$this->load_user_form(new Entities\User);
	}

	public function update(){
		$this->store_user($this->doctrine->em->find('Entities\User', $this->input->post('id', true)), false);
	}

	public function create(){
		$this->store_user(new Entities\User);
	}

	function hashPassword($password){
		$salt = sha1(rand());
		$salted_password = sha1($password.$salt);
		return $salted_password.':'.$salt;
	}

	/*
	* Helper to strore the user on the database
	*/
	function store_user($user, $newUser = true){
		$username = stringsHelper::sanitize_string($this->input->post('username', true));
		$password = $this->input->post('password', true);

		if($password){
			$user->setPassword($this->hashPassword($password));
		}
		$user->setFullName($this->input->post('fullname', true));
		$user->setUserName($username);
		$user->setAdmin($this->input->post('admin', true));

		if($newUser){
			if(!$password)
				$this->addMessage('Debe ingresar una clave.', 'error');
			if($this->doctrine->em->getRepository('Entities\User')->findOneBy(array('username' => $username)))
				$this->addMessage('El nombre de usuario ya existe.', 'error');
		}

		if($password != $this->input->post('password-confirm', true)){
			$this->addMessage('La clave y su confirmación no son iguales.', 'error');
		}

		if($this->error){
			$this->load_user_form($user, $newUser);
		}else{
			$this->doctrine->em->persist($user);
			$this->doctrine->em->flush();

			redirect('backend/user');
		}

	}

	/*
	* Helper to load the user form view
	*/
	function load_user_form($user, $newUser = true){
		$this->loadData('formAction', $newUser?site_url('backend/user/create'):site_url('backend/user/update'));
		$this->loadData('user', $user);

		$this->loadBlock('content', 'backend/user/form', $this->data);

		$this->loadScript('users', site_url('assets/js/backend/user.js'));
		$this->loadScript('redactor', site_url('assets/js/redactor/redactor.min.js'));

		$this->renderView('backend/layout');
	}
}