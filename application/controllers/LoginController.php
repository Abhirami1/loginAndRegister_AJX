<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('LoginModel');
        $this->load->library('session');
        
    }


    public function login_check()
    {
        $email=$this->input->post('email');

        $password=$this->input->post('pass');

        $pass=md5($password);


        $logincheck=$this->LoginModel->user_Exist($email,$pass);

        echo $logincheck;
    }


    public function homepage()
    {
        $this->load->view('homepage');
    }


    public function logout()
    {
        $loginId=$this->input->post('id');
        $logout=$this->LoginModel->logout($loginId);
        echo $logout;
    }





























}