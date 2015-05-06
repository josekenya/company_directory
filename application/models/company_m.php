<?php
class Company_m extends CI_Model
{
    function get_companies($id)
	{
	     $query=$this->db->get_where('company_details',array('owner_id'=>$id));
	     if($query->num_rows()>0)
	     {
	       $results=$query->result_array();
	       foreach ($results as $result) {
	         $rows[]=$result;
	       }
	       return $rows;
	     }
	     else
	     {
	        //echo "No data found";
	        return false;
	     }
	}
	function get_msg_count($id)
	{
		$this->db->where(array('unread' => 1,'company_id'=>$id));
		$this->db->from('messages');
		return $this->db->count_all_results();
	}
	function get_msg_list($id)
	{
		$query=$this->db->get_where('messages',array('company_id'=>$id));
		$this->db->order_by('duration','desc');
	     if($query->num_rows()>0)
	     {
	       $results=$query->result_array();
	       foreach ($results as $result) {
	         $rows[]=$result;
	       }
	       return $rows;
	     }
	     else
	     {
	        //echo "No data found";
	        return false;
	     }
	}
	
	function update_unread($id)
	{
      $data=array('read'=>1,'unread'=>0);
      $this->db->where('message_id',$id);
      $query=$this->db->update('messages',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }	
	} 
	function get_co_msg($id)
	{ 
		 $query=$this->db->get_where('messages',array('message_id'=>$id));
	     if($this->db->affected_rows($query)==1)
	     {
	     	$this->update_unread($id);
	       $results=$query->result_array();
	       foreach ($results as $result) {
	         $rows=$result;
	       }
	       return $rows;
	     }
	     else
	     {
	        //echo "No data found";
	        return false;
	     }
	    
	}
	function get_photos($id)
	{
		$query=$this->db->get_where('company_photos',array('company_id'=>$id));
	     if($query->num_rows()>0)
	     {
	       $results=$query->result_array();
	       foreach ($results as $result) {
	         $rows[]=$result;
	       }
	       return $rows;
	     }
	     else
	     {
	        //echo "No data found";
	        return false;
	     }
	}
	function get_services($id)
	{
		$query=$this->db->get_where('services',array('company_id'=>$id));
	     if($query->num_rows()>0)
	     {
	       $results=$query->result_array();
	       foreach ($results as $result) {
	         $rows[]=$result;
	       }
	       return $rows;
	     }
	     else
	     {
	        //echo "No data found";
	        return false;
	     }
	}
	function get_co_details($id)
	{
		$this->db->select('*');
		$this->db->from('company_details');
		$this->db->where('company_id',$id);
		$query=$this->db->get();
		if($this->db->affected_rows($query))
		{
           $results=$query->result_array();
	       foreach ($results as $result) {
	         $rows=$result;
	       }
	       return $rows;
		}
		else
	    {
	    	return false;
	    }

	}
	function company_count($id)
	{
		$this->db->where('owner_id',$id);
		$this->db->from('company_details');
		return $this->db->count_all_results();
	}
	function add_message()
	{
		$data=array('message'=>$this->input->post('message'),
	      	             'company_id'=>$this->input->post('co-id'),
	      	             'sender'=>$this->input->post('email'),
	      	             'unread'=>1,
	      	             'duration'=>time());
	      $query=$this->db->insert('messages',$data);
	      if($this->db->affected_rows($query)==1)
	      {
	          return true;
	      }
	      else
	      {
	      	return false;
	      }
	}
	function add_company()
	{
	      $company=array('company_name'=>$this->input->post('company-name'),
	      	             'owner_id'=>$this->input->post('owner-id'));
	      $query=$this->db->insert('company_details',$company);
	      if($this->db->affected_rows($query)==1)
	      {
	          return true;
	      }
	      else
	      {
	      	return false;
	      }
	}
	function delete_company($id)
	{ 	
      $result=$this->db->delete('company_details', array('company_id' => $id));
      if($this->db->affected_rows($result)==1)
      {
      	echo "Venue Deleted";
      	//return true;
      }
      else
      {
      	return false;
      }
	}
	function add_service()
	{
		$data=array('service_name' =>$this->input->post('s_val'),'company_id'=>$this->input->post('id') );
		$query=$this->db->insert('services',$data);
	}
	function add_gallery($filename)
	{
		$data=array(
        'photo_url'=>$filename,'company_id'=>$this->input->post('company-id'));
         $query=$this->db->insert('company_photos',$data);

      if($this->db->affected_rows($query)==1)
      {
        
          return true;
      }
      else
      {
      	return false;
      }
	}
	function delete_service($id)
	{
      $result=$this->db->delete('services', array('service_id' => $id));
      if($this->db->affected_rows($result)==1)
	      {
	          return true;
	      }
	      else
	      {
	        return false;
	      }
	}
	function delete_photo($id)
	{
		$result=$this->db->delete('company_photos', array('id' => $id));
		if($this->db->affected_rows($result)==1)
	      {
	          return true;
	      }
	      else
	      {
	        return false;
	      }
	}
	function update_info($id)
	{
      $data=array('company_name'=>$this->input->post('co-name'),'industry_category'=>$this->input->post('industry-category'));
      $this->db->where('company_id',$id);
      $query=$this->db->update('company_details',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }
	}
	function update_contact_info($id)
	{
	  $data=array('company_mobile_number'=>$this->input->post('mobile-number'),
	  	          'company_telephone_number'=>$this->input->post('tel-number'),
	  	           'company_email'=>$this->input->post('email'));
      $this->db->where('company_id',$id);
      $query=$this->db->update('company_details',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }
	}
	function update_company_profile($id)
	{
	  $data=array('company_profile'=>$this->input->post('company-profile'));
      $this->db->where('company_id',$id);
      $query=$this->db->update('company_details',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }	
	}
	function update_company_address($id)
	{
	  $data=array('street_address'=>$this->input->post('street-address-1'),
	  	          'street_address_2'=>$this->input->post('street-address-2'),
	  	          'city'=>$this->input->post('city'),
	  	          'zip_code'=>$this->input->post('zip-code'),
	  	          'country'=>$this->input->post('country'));
      $this->db->where('company_id',$id);
      $query=$this->db->update('company_details',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }	
	}
	function update_operation_details($id)
	{
	  $data=array('employee_number'=>$this->input->post('employeeNo'),
	  	          'opening'=>$this->input->post('opening'),
	  	          'closing'=>$this->input->post('closing'),
	  	          'w_opening'=>$this->input->post('w-opening'),
	  	          'w_closing'=>$this->input->post('w-closing'));
      $this->db->where('company_id',$id);
      $query=$this->db->update('company_details',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }	
	}
	function update_publish($id)
	{
	  $data=array('template'=>$this->input->post('templateRadio'));
      $this->db->where('company_id',$id);
      $query=$this->db->update('company_details',$data);
      if($this->db->affected_rows($query)==1)
      {
          return true;
      }
      else
      {
        return false;
      }	
	}
	function search($terms, $start = 0, $results_per_page = 0)
    {
        // Determine whether we need to limit the results
        if ($results_per_page > 0)
        {
            $limit = "LIMIT $start, $results_per_page";
        }
        else
        {
            $limit = '';
        }
 
        // Execute our SQL statement and return the result
        $sql = "SELECT *
                    FROM company_details
                    WHERE MATCH (company_profile) AGAINST (?) > 0
                    $limit";
        $query = $this->db->query($sql, array($terms, $terms));
        return $query->result();
    }
 
    function count_search_results($terms)
    {
        // Run SQL to count the total number of search results
        $sql = "SELECT COUNT(*) AS count
                    FROM company_details
                    WHERE MATCH (company_profile) AGAINST (?)";
        $query = $this->db->query($sql, array($terms));
        return $query->row()->count;
    }

}