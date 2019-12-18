<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Superadmin_model extends CI_model
{
	
// data insert in superadmin table  
public function superadmin_dataInsert($data)
{
	  return $this->db->insert('superadmin',$data);
} 

// code for login
public function admin_login($username,$password)
{
	$q = $this->db->where('username',$username)
		          ->where('password',$password)
		          ->from('superadmin')
		          ->get();     
	if($q->num_rows() == 1) 
		{
        return $q->row();
        }

        return false;
 
}

public function insert_backenduser($data)
{
	return $this->db->insert('wp_backend_user',$data);

}




} // end main class