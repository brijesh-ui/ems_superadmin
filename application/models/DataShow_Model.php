<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class DataShow_Model extends CI_model
{
 
     //var $table = "wp_backend_user";  	
      var $select_column = array("user_id", "login_name","role","school_name","first_name","last_name","user_email","user_phone","user_mobile","user_dob","user_doj");  
      var $order_column = array(null, "login_name","role","school_id","first_name","last_name","user_email","user_phone","user_mobile","user_dob","user_doj",null); 

      function make_query()  
{  
           $this->db->select($this->select_column);  
           $this->db->from('wp_backend_user');
           $this->db->join('wp_school','wp_school.id=wp_backend_user.school_id');
           if(isset($_POST["search"]["value"]))  
           {  
            $this->db->like("login_name", $_POST["search"]["value"]);
            $this->db->like("role", $_POST["search"]["value"]);
            $this->db->like("school_name", $_POST["search"]["value"]);
            $this->db->like("first_name", $_POST["search"]["value"]);
            $this->db->like("last_name", $_POST["search"]["value"]);
            $this->db->like("user_email", $_POST["search"]["value"]);
            $this->db->like("user_phone", $_POST["search"]["value"]);
            $this->db->like("user_mobile", $_POST["search"]["value"]);
            $this->db->like("user_dob", $_POST["search"]["value"]);
            $this->db->like("user_doj", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

           }  
           else  
           {  
                $this->db->order_by('user_id', 'DESC');  
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
           $this->db->from('wp_backend_user');
           $this->db->join('wp_school','wp_school.id=wp_backend_user.school_id');  
           return $this->db->count_all_results();  
} 

public function deleteUserdata($id)
{
	return $this->db->where('user_id',$id)
	                ->delete('wp_backend_user');
}

public function update_data($user_id,Array $data)
{
    
   return $this->db->where('user_id',$user_id)
                   ->update('wp_backend_user',$data);
}




}// end of main class