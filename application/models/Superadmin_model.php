<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Superadmin_model extends CI_model
{    
// variable initialize for datatable .....	 
var $table = "wp_school";  
var $select_column = array("id", "school_name");  
var $order_column = array(null, "school_name", null);  	
	
// data insert in superadmin table  
public function superadmin_dataInsert($data)
{
return $this->db->insert('superadmin',$data);
} 

// code for login
public function admin_login($username,$password)
{
  $q = $this->db->select('*')
  	            ->where('username',$username)
  		          ->where('password',$password)
  		          ->from('superadmin')
  		          ->get()->result_array();
  if(count($q)>0)
    {
        if($q[0]['status']==0){
            return 1;
        }
        else
        {
            return $q[0];
        }
    }
    else
    {
        return false;
    }
}

public function insert_backenduser($data)
{
return $this->db->insert('wp_backend_user',$data);

}

public function insert_schoolName($school)
{
return $this->db->insert('wp_school',$school);
} 

// code for ajax datatable for school name
function make_query()  
{  
$this->db->select($this->select_column);  
$this->db->from($this->table);  
if(isset($_POST["search"]["value"]))  
{  
  $this->db->like("school_name", $_POST["search"]["value"]);
}  
if(isset($_POST["order"]))  
{  
  $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
}  
else  
{  
  $this->db->order_by('id', 'DESC');  
}  
}  
function make_datatables()
{  
$this->make_query();  
if($_POST["length"] != -1)  
{  
  $this->db->limit($_POST['length'], $_POST['start']);  
}  
  $query = $this->db->get();  
  return $query->result();  
}  
function get_filtered_data()
{  
  $this->make_query();  
  $query = $this->db->get();  
  return $query->num_rows();  
}       
function get_all_data()  
{  
  $this->db->select("*");  
  $this->db->from($this->table);  
  return $this->db->count_all_results();  
}  

public function deleteSchoolName($id,$school)
{
	return $this->db->where('id',$id)
	                ->delete('wp_school');
}

public function update_dataModel($id,$school)
{

   return $this->db->query("update wp_school SET school_name='$school'where id='".$id."'");
}




} // end main class