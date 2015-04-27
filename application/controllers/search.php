<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
	function _construct()
	{
		parent::_construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}
	function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			//redirect('auth/login', 'refresh');
			$data=array('page_title'=>'Search here');
		    $this->template->load('home', 'pages/search_home_v', $data);
		}
		//$data=array('page_title'=>'Search here');
		//$this->template->load('home', 'pages/search_home_v', $data);
	}
	function login()
	{
		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the admin page
				redirect('me', 'refresh');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page
				$data['errors']=$this->ion_auth->errors();
				echo json_encode($data);
				//redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$data['errors'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			echo json_encode($data);
		}
	}
	
	function create_user()
	{
		//$this->data['title'] = "Create User";
		$tables = $this->config->item('tables','ion_auth');

		//validate form input
		$this->form_validation->set_rules('first-name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last-name', $this->lang->line('create_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password-confirm]');
		$this->form_validation->set_rules('password-confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first-name')) . ' ' . strtolower($this->input->post('last-name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first-name'),
				'last_name'  => $this->input->post('last-name'),
				'phone'      => $this->input->post('phone')
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$data['success']= $this->ion_auth->messages();
			echo json_encode($data);
			//redirect("auth", 'refresh');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$data['errors'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
             echo json_encode($data);
	
		}
	}

}