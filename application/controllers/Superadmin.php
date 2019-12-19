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

//controller to check username ext

public function Checkusername_exit()
{
    $requestusername = $this->input->post('username');
    $getemail=$this->db->get_where('superadmin',array('username' => $requestusername))->num_rows();
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
            $session_data = array
            (
            'id' => $login_id->id,
            'username' => $login_id->username,
            'password' => $login_id->password
             );

        $this->session->set_userdata('logged_in',$session_data);
        redirect(base_url('superadmin/dashboard'));
          }

        else{

            $this->session->set_flashdata('login_failed', 'Your account is not activated yet, plese wait ..');
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
     $session_data = array
            (
            'id' => '',
            'username' => '',
            'password' => ''
             );
    $this->session->unset_userdata('logged_in',$session_data ); 
    return redirect(base_url('superadmin/index'));
}

// for redirect forget password link
public function forget_password()
{
	$this->load->view('forget_password');
}  

//reset password 
public function reset_password()
{
	$this->load->view('reset_password');
} 

public function update_password()
{
	if($this->input->post('update'))
	{
		$user_id = $this->input->post('user_id');
		$password = md5($this->input->post('password'));
		$confirm_password = md5($this->input->post('confirm_password'));
		if($password==$confirm_password)
		{
		$update=$this->db->set('password',$password)
		                 ->where('id',$user_id)
		                 ->from('superadmin')
                         ->update();
        if($update)
        {    
        	 $this->session->set_flashdata('update','your password updated successfully');
        	 redirect(base_url('superadmin/reset_password'));
        }                                        
		}
		else
		{
          echo "Plese confirm the same password"; 
		}
	}

}


//forget password send mail code
public function password_sendMail()
{
	if($this->input->post('recover'))
    {

    $email = $this->input->post('email');
    $get = $this->db->where('email',$email)
                         ->from('superadmin')
                         ->get();
    $getemail = $get->result_array();                
    if(count($getemail)==1)
    {

    $user_id = $getemail[0]['id'];
    $url = base_url('superadmin/reset_password/"'.$user_id.'"');
    $data = '<a href="'.$url.'">click here to reset password</a>';
    print_r($data);
    die;
    $to = $getemail[0]['email'];
    $subject = 'Your password reset request';
    $from = 'brijesh@sodainmind.com';
    // set email content
    $emailContent = '<header style="height: 30px; width: 100%; background-color: #333; text-align: center;">
                     <h3 style="color: white;">Email from ems superadmin</h3></header>';
    $emailContent.='<h2><a href="'.$url.'">click here to reset password</a></h2>';                         
    
    // configure for send mail 
    $config['protocol']    = 'smtp';
    $config['smtp_host']   = 'smtp.sendgrid.net';
    $config['smtp_port']   = 587;
    $config['crlf']        = "\r\n";
    $config['newline']     = "\r\n";
    $config['smtp_user'] = '';
    $config['smtp_pass'] = '';
    // $config['api_user']   = 'Brijesh_Maurya';    //Important
    // $config['api_key']    = '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';  //Important
    // $config['api_format'] = 'json';
     
    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect(base_url('superadmin/forget_password'));
    	
    }
    else
    {
    	echo "You have enter incorrect email ";
    }	
    
    } // end if


} // end of send mail function

// backend user controlloer
public function load_backend_user()
{
	$this->load->view('backenduser_insert');

}

public function data_insert()
{
	if($this->input->post('submit'))
	{
	$data['school_id'] = $this->input->post('school_id');
	$data['role'] = $this->input->post('role');
	$data['login_name'] = $this->input->post('login_name');
	$data['password']= md5($this->input->post('password'));
	$data['first_name'] = $this->input->post('first_name');
	$data['last_name'] = $this->input->post('last_name');
    $data['user_email'] = $this->input->post('user_email');
    $data['user_phone'] = $this->input->post('user_phone');
    $data['user_mobile'] = $this->input->post('user_mobile');
    $data['user_dob'] = $this->input->post('user_dob');
    $data['user_doj'] = $this->input->post('user_doj');
    $insert = $this->superadmin->insert_backenduser($data);
    if($insert)
	{
        $this->session->set_flashdata('message',"Your Registration Successfull");
        $this->load->view('backenduser_insert');
	}
	
    }
}

// check user exit in backend user table
public function Checkemail_userbackend()
{
	$requestedEmail = $this->input->post('user_email');
	$getemail=$this->db->get_where('wp_backend_user',array('user_email' => $requestedEmail))->num_rows();
	if($getemail == 0)
	{
		echo 'true';
	}
	else
	{
		echo 'false';
	}

}

public function Checkloginname_userbackend()
{
    $requestedLoginname = $this->input->post('login_name');
    $getname=$this->db->get_where('wp_backend_user',array('login_name' => $requestedLoginname))->num_rows();
    if($getname == 0)
    {
        echo 'true';
    }
    else
    {
        echo 'false';
    }

}


// dbackend user data edit
public function show_backenduser()
{
	$this->load->view('show_backenduser');
}

public function showedit_data()
{
	$this->load->view('edit_data');
}

public function edit_backendUser($user_id)
{
	if($this->input->post('submit'))
	{
	$data['school_id'] = $this->input->post('school_id');
	$data['role'] = $this->input->post('role');
	$data['login_name'] = $this->input->post('login_name');
	$data['first_name'] = $this->input->post('first_name');
	$data['last_name'] = $this->input->post('last_name');
    $data['user_email'] = $this->input->post('user_email');
    $data['user_phone'] = $this->input->post('user_phone');
    $data['user_mobile'] = $this->input->post('user_mobile');
    $data['user_dob'] = $this->input->post('user_dob');
    $data['user_doj'] = $this->input->post('user_doj');
	$update = $this->superadmin->update_data($user_id,$data);
	if($update)
	{
		echo "Data Updated";
	}
	}	
}

// school data
public function insertSchool()
{
    $this->load->view('insertSchool');
}

public function insert_School()
{
    if($this->input->post('submit'))
    {
        $school['school_name'] = $this->input->post('school_name');
        $insert = $this->superadmin->insert_schoolName($school);
    if($insert)
    {
        $this->session->set_flashdata('message',"Your Data Inserted Successfully");
        $this->load->view('insertSchool');
    }
    }
    
}




}// end of main class
