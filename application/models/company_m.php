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
	function update_info($id)
	{
      $data=array('company_name'=>$this->input->post('co-name'));
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
	  $data=array('company_name'=>$this->input->post('co-name'));
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

}