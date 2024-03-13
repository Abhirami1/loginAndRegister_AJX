<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ForgotModel');
    }


    public function check_email_exist(){

        $email=$this->input->post('email');

		$checkemail=$this->ForgotModel->check_email($email);
		echo $checkemail;

    }


    public function forgot_password()
    {

        
        $token=md5(rand());

        $email=$this->input->post('email');

        $update=$this->ForgotModel->update_token($email,$token);

        echo $update;
    }


    public function password_change()
    {
        $this->load->view('password_change');
    }
}