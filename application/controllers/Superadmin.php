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
            $userdata = array
            (
            'id' => $login_id->id,
            'username' => $login_id->username,
            'password' => $login_id->password
             );

        $this->session->set_userdata($userdata);
        redirect(base_url('superadmin/dashboard'));
          }

        else{

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
    // echo "<a href='reset_password/".$user_id."'>Reset Password";
    // die;
    $to = $getemail[0]['email'];
    $subject = 'Password Reset Mail';
    $from = 'brijesh@sodainmind.com';
    // set email content
    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid 
                    #cccccc;margin: auto;border-spacing:0;"><tr><td
                    style="background:#ffffff;padding-left:3%">Ems-Superadmin</td></tr>';
    $emailContent.='<tr><td style="height:20px"></td></tr>';
    $emailContent.='<tr><td style="height:20px">"'."<a href='reset_password/".$user_id."'>Reset Password".'
                   "</td></tr>';
    $emailContent.='<tr><td style="height:20px"></td></tr>';                
    $emailContent.= "<tr><td style='background:#000000;color: #ffffff;padding: 2%;text-align: center;font-size:
                    13px;'><p style='margin-top:1px;'>Ems Superadmin</p></td></tr></table></body></html>";
    
    // configure for send mail 
    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'smtp.sendgrid.net';
    $config['smtp_port']    = '587';
    $config['smtp_timeout'] = '60';

    $config['api_user']   = 'Brijesh_Maurya';    //Important
    $config['api_key']    = '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';  //Important
    $config['api_format'] = 'json';

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     

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




}// end of main class
