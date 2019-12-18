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

// controller to check email exit in superadmin table 

	public function Checkemail_emailexit()
		{
			$requestedEmail = $this->input->post('email');
			$getemail=$this->db->get_where('superadmin',array('email' => $requestedEmail))->num_rows();
			if($getemail == 0)
			{
				echo 'true';
			}
			else
			{
				echo 'false';
			}
       }

       

// controller for superadmin login   
	public function superadmin_login()
	{
		 $this->form_validation->set_rules('username','Username','required');	
           $this->form_validation->set_rules('password','Password','required');	

           if($this->form_validation->run())
           {
           	  $username = $this->input->post('username');
              $password = md5($this->input->post('password'));
              $login_id = $this->superadmin->admin_login($username,$password);
              if($login_id)
              	  {
              	  	 $userdata = array(
                    'id' => $login_id->id,
                    'username' => $login_id->username,
                    'password' => $login_id->password
                     );

              	  	 $this->session->set_userdata($userdata);
              	  	 redirect(base_url('superadmin/dashboard'));
              	  }

               else {

                $this->session->set_flashdata('login_failed', 'Invalid Username/Password');
                redirect(base_url('superadmin/index'));
            }
           }
           else
           {
             $this->load->view('superadmin/index');
           }
	}

// admin dashboard 

	public function dashboard()
	{
		$this->load->view('dashboard');
	}

// admin logout 

	public function logout()
        {
            $this->session->unset_userdata('id'); 
             redirect(base_url('superadmin/index'));
        }   


}
