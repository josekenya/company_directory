<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Me extends CI_Controller
{
	function _construct()
	{
		parent::_construct();
	}

	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('search', 'refresh');
		}
		else
		{
			//redirect them to the login page
			$id=$this->session->userdata('user_id');
			$data['company_count']=$this->company_m->company_count($id);
			$data['co']=$this->company_m->get_companies($id);
			$data['page_title']='Admin';
		    $this->template->load('admin_default','pages/dashboard_v', $data);
		}
	}
	function add_company()
	{
		 $this->form_validation->set_rules('company-name','Company Name','required');
		 if($this->form_validation->run()==false)
		 {
	       $data['errors']=validation_errors();
	       echo json_encode($data);
		 }	
		 else
		 {
		  $this->company_m->add_company();
		  $data['success']="Company Created!";
		  echo json_encode($data);
		 }
	}
	function delete_company()
	{
	  $id=$this->input->post('id');	
      $this->company_m->delete_company($id);
	}
	function profile()
	{
       
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('search', 'refresh');
		}
		else
		{
			//redirect them to the login page
			 $id=$this->session->userdata('user_id');
			$this->data['users']=$this->ion_auth->user($id)->row();
			$this->data['page_title']='My Profile';
		    $this->template->load('admin_default','pages/admin_profile_v', $this->data);
		}
	}
	function update()
	{
		$id = $this->input->post('id');
		$data = array(
					'first_name' => $this->input->post('first-name'),
					'last_name' => $this->input->post('last-name'),
					'phone' => $this->input->post('phone-number')
					 );
		if ($this->ion_auth->update($id, $data))
		{
			$data['success'] = $this->ion_auth->messages();
			echo json_encode($data);
		}
		else
		{
			$data['errors'] = $this->ion_auth->errors();
			echo json_encode($data);
		}
	}
	function update_password()
	{
		$this->form_validation->set_rules('old-password', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new-password', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[confirm-password]');
		$this->form_validation->set_rules('confirm-password', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('search', 'refresh');
		}
		//$user = $this->ion_auth->user()->row();
		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['errors'] = (validation_errors()) ? validation_errors() : $this->sessihn->flashdata('message');
			echo json_encode($this->data);

		}
		else
		{
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old-password'), $this->input->post('confirm-password'));

			if ($change)
			{
				//if the password was successfully changed
				$data['success']=$this->ion_auth->messages();
				echo json_encode($data);
				$this->logout();
			}
			else
			{
				$data['errors']=$this->ion_auth->errors();
				echo json_encode($data);
				//redirect('auth/change_password', 'refresh');
			}
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