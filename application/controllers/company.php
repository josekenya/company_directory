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
			redirect('pages/search', 'refresh');
		}
		else
		{
			//redirect them to the login page
			$id=$this->uri->segment(2);
			$data['photos']=$this->company_m->get_photos($id);
			$data['services']=$this->company_m->get_services($id);
			$data['company']=$this->company_m->get_co_details($id);
			$data['page_title']='Company Profile';
		    $this->template->load('company_default','pages/company_profile_v', $data);
		}
	}
	function get_new_msg()
	{
		$id=$this->input->post('m_id');
		$data['new_msg']=$this->company_m->get_msg_count($id);
		echo json_encode($data);
	}
	function get_messages()
	{ 
		$id=$this->input->post('c_id');
		$data['messages']=$this->company_m->get_msg_list($id);
		echo json_encode($data);
	}
	function get_msg_details()
	{  
        //if($this->company_m->update_unread($id))
        $id=$this->input->post('t_id');
        $data['co_msg']=$this->company_m->get_co_msg($id);
        echo json_encode($data);  
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
	function add_service()
	{
		$this->company_m->add_service();
	}
	function delete_service()
	{
		$id=$this->input->post('id');
		if($this->company_m->delete_service($id)== true)
          {
            $data['success']="Item deleted";
            echo json_encode($data);
          }
          else
          {
          	$data['errors']="An error was encoutered.Please try again";
          	echo json_encode($data);
          }
	}
	function add_photo()
	{
		 //file name
        $file_element_name="upload-file";
		//image file config
        $config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpeg|png|jpg';
		$config['max_size']	= '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
        $this->upload->initialize($config);

		if(!$this->upload->do_upload($file_element_name))
		{
           $data['errors']=$this->upload->display_errors();
           echo json_encode($data);
		}
		else
		{
			$data=$this->upload->data();
			if($this->company_m->add_gallery($data['file_name']))
			{
				//echo $data['file_name'];
				$data['success']="Image Added!";
				echo json_encode($data);
			}
			else
			{
				unlink($data['full_path']);
				$data['errors']="Something went wrong.Please try again";
				echo json_encode($data);
			}
			
		}
	}
	function delete_photo()
	{
		$id=$this->input->post('id');
		$this->company_m->delete_photo($id);
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