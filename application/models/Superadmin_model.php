<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Superadmin_model extends CI_model
{
	
 // data insert in superadmin table  
	public function superadmin_dataInsert($data)
	{
	  return $this->db->insert('superadmin',$data);
	} 



} // end main class