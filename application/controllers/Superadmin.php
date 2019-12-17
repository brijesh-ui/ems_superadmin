<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	 public function __construct()
        {
                parent::__construct();
                $this->load->model('Superadmin_model','superadmin');
                
        }

// controller for load the index page
	public function index()
	{
		$this->load->view('index');
	}
   

// controller for superadmin login   
	public function superadmin_login()
	{
		$this->load->view('dashboard');
	}

//controller for superadmin registration 
	public function register()
	{
		$this->load->view('admin_register.php');
	}

	public function superadmin_register()
	{ 

		if($this->input->post('register'))
		{
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['password']= md5($this->input->post('password'));
			$this->superadmin->superadmin_dataInsert($data);
			if($data)
			{
              $this->session->set_flashdata('message',"Your Registration Successfull");
              $this->load->view('admin_register');
			}

		}
	
	}
}
