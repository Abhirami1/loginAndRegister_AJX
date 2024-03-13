<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();

		$this->load->model('UserModel');
		
	}

	


	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome_message');
		$this->load->view('footer');
	}
	public function register()
	{
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	public function forgot()
	{
		$this->load->view('forgot');
	}


	public function login_register()
	{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$password=$this->input->post('pass');

		$hash=md5($password);
		$data=array(
		
			'username' =>$name,
			'email'  => $email,
			'password' =>$hash
		);

		

		$inservalue=$this->UserModel->insert_User($data);
		echo $inservalue;

		
	}

	public function check_email()
	{
		$email=$this->input->post('email');

		$checkemail=$this->UserModel->check_Email($email);
		echo $checkemail;
		
	}













}
