<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DataShow extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('DataShow_Model'); 
                          
}

public function show_userData()
{
	$this->load->view('show_userData');
	
}

public function fetch_data()
{
           
	       $fetch_data = $this->DataShow_Model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $user_id = $row->user_id;
                $delete_url = base_url() . '/DataShow/delete_backenddata/' . $user_id;
                $update_url =base_url() . '/DataShow/edit_userData/' . $user_id; 
                $sub_array = array();  
                $sub_array[] = $row->login_name;
                $sub_array[] = $row->role;
                $sub_array[] = $row->school_name; 
                $sub_array[] = $row->first_name; 
                $sub_array[] = $row->last_name; 
                $sub_array[] = $row->user_email;
                $sub_array[] = $row->user_phone;
                $sub_array[] = $row->user_mobile;
                $sub_array[] = $row->user_dob;
                $sub_array[] = $row->user_doj;  
                $sub_array[] = '<a href="' . $update_url . '" class="btn btn-danger btn-xs">Update</a>';
                $sub_array[] = '<a href="' . $delete_url . '" class="btn btn-danger btn-xs">Delete</a>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->DataShow_Model->get_all_data(),  
                "recordsFiltered"     =>     $this->DataShow_Model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);

}

public function delete_backenddata()
{
	$id=$this->uri->segment('3');
    $delete = $this->DataShow_Model->deleteUserdata($id);
    if($delete)
    {
        $this->session->set_flashdata('delete',"Data deleted successfully");
        $this->load->view('show_userData');
    }
}

public function edit_userData()
{
    $this->load->view('edit_userData.php');

}

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


public function edit_backendUser()
{
  if($this->input->post('submit'))
    {
    $user_id = $this->input->post('user_id');   
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
    $update = $this->DataShow_Model->update_data($user_id,$data);
    if($update)
    {
        $this->session->set_flashdata('update','Your data updated successfully');
        $this->load->view('show_userData');
    }
    
    }      
}






}// end of main class