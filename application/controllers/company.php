<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends CI_Controller
{
	function _construct()
	{
		parent::_construct();
	}

	function index()
	{
		if(!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('search', 'refresh');
		}
		else
		{
			//redirect them to the login page
			$id=$this->uri->segment(2);
			$data['company']=$this->company_m->get_co_details($id);
			$data['page_title']='Company Profile';
		    $this->template->load('company_default','pages/company_profile_v', $data);
		}
	}

	function edit_info()
	{
		if($this->session->userdata('user_id')===$this->input->post('user-id'))
		{
          $id=$this->input->post('company-id');
          if($this->company_m->update_info($id))
          {
            $data['success']="Company Info Saved";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
		}
		else
		{
			$this->logout();
		}
      
	}
	function edit_contact_info()
	{
		if($this->session->userdata('user_id')===$this->input->post('user-id'))
		{
          $id=$this->input->post('company-id');
          if($this->company_m->update_contact_info($id))
          {
            $data['success']="Contact Info Saved";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
		}
		else
		{
			$this->logout();
		}
	}
	function edit_company_profile()
	{
		if($this->session->userdata('user_id')===$this->input->post('user-id'))
		{
          $id=$this->input->post('company-id');
          if($this->company_m->update_company_profile($id))
          {
            $data['success']="Company Profile Saved";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
		}
		else
		{
			$this->logout();
		}
	}
	function edit_company_address()
	{
		if($this->session->userdata('user_id')===$this->input->post('user-id'))
		{
          $id=$this->input->post('company-id');
          if($this->company_m->update_company_address($id))
          {
            $data['success']="Company Address Saved";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
		}
		else
		{
			$this->logout();
		}
	}
	function edit_operation_details()
	{
		if($this->session->userdata('user_id')===$this->input->post('user-id'))
		{
          $id=$this->input->post('company-id');
          if($this->company_m->update_operation_details($id))
          {
            $data['success']="Company Operation Details Saved";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
		}
		else
		{
			$this->logout();
		}
	}
	function edit_publish()
	{
		if($this->session->userdata('user_id')===$this->input->post('user-id'))
		{
          $id=$this->input->post('company-id');
          if($this->company_m->update_publish($id))
          {
            $data['success']="Company Published Successfully";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
		}
		else
		{
			$this->logout();
		}
	}
	function logout()
	{
		//log the user out
		$logout = $this->ion_auth->logout();
		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('search', 'refresh');
	}
}