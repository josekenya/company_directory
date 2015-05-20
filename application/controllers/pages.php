<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	function _construct()
	{
		parent::_construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}
	function index($search_terms = '',$categories = '',$cities = '',$start = 0)
	{
		if(!$this->ion_auth->logged_in())
		{
            $data['page_title'] = 'Search Company';
	        $data['search_terms'] = $search_terms;
	        $data['categories'] = $categories;
	        $data['cities'] = $cities;
	        $data['first_result'] = @$first_result;
	        $data['last_result'] = @$last_result;
	        $data['total_results'] = @$total_results;
	        $data['results'] = @$results;
            /*
			$data= array(
        	'page_title'=>'Search Company',
            'search_terms' => $search_terms,
            'first_result' => @$first_result,
            'last_result' => @$last_result,
            'total_results' => @$total_results,
            'results' => @$results
             );
             */

		    $this->template->load('home', 'pages/search_home_v', $data);
		}
		else
		{
			redirect('me','refresh');

		}
	}
	
	function search($search_terms = '',$categories= '',$cities= '', $start = 0)
	{
		if (!$this->ion_auth->logged_in())
		{
			// If the form has been submitted, rewrite the URL so that the search
        // terms can be passed as a parameter to the action. Note that there
        // are some issues with certain characters here.
		/*
		if (empty($this->input->post('q')))
        {
            redirect('/' . $this->input->post('q'));
        }
        */	
        if($this->input->post('q') || $this->input->post('ct') || $this->input->post('cy')  )
        {
            redirect('/search/' . $this->input->post('q') .'/'.$this->input->post('ct').'/'.$this->input->post('cy'));
        }
 
        if ($search_terms || $categories || $cities)
        {
            // Determine the number of results to display per page
            $results_per_page = $this->config->item('results_per_page');
 
            // Load the model, perform the search and establish the total
            // number of results
            //$this->load->model('page_model');
            $results = $this->company_m->search($search_terms, $categories,$cities, $start, $results_per_page);
            $total_results = $this->company_m->count_search_results($search_terms,$categories,$cities);
 
            // Call a method to setup pagination
            $this->_setup_pagination('/search/' . $search_terms . '/', $total_results, $results_per_page);
 
            // Work out which results are being displayed
            $first_result = $start + 1;
            $last_result = min($start + $results_per_page, $total_results);
        }
 
        // Render the view, passing it the necessary data
        $data['page_title'] = 'Search Company';
        $data['search_terms'] = $search_terms;
        $data['categories'] = $categories;
        $data['cities'] = $cities;
        $data['first_result'] = @$first_result;
        $data['last_result'] = @$last_result;
        $data['total_results'] = @$total_results;
        $data['results'] = @$results;
        /*
        $data= array(
        	'page_title'=>'Search Company',
            'search_terms' => $search_terms,
            'categories' => @$categories,
            'cities' => @$cities,
            'first_result' => @$first_result,
            'last_result' => @$last_result,
            'total_results' => @$total_results,
            'results' => @$results
        );
        */
        $this->template->load('home', 'pages/search_results_v', $data);

        
		}
		else
		{
			redirect('me','refresh');
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
				//redirect('me', 'refresh');
				$data['success']="1";
				echo json_encode($data);
				
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

	
    function _setup_pagination($url, $total_results, $results_per_page)
    {
        // Ensure the pagination library is loaded
        $this->load->library('pagination');
 
        // This is messy. I'm not sure why the pagination class can't work
        // this out itself...
        $uri_segment = count(explode('/', $url));
 
        // Initialise the pagination class, passing in some minimum parameters
        $this->pagination->initialize(array(
            'base_url' => site_url($url),
            'uri_segment' => $uri_segment,
            'total_rows' => $total_results,
            'per_page' => $results_per_page
        ));
    }
    function send_message()
    {
    	$this->form_validation->set_rules('message','Message','required');
		 if($this->form_validation->run()==false)
		 {
	       $data['errors']=validation_errors();
	       echo json_encode($data);
		 }	
		 else
		 {
		  $this->company_m->add_message();
		  $data['success']="Message Sent";
		  echo json_encode($data);
		 }
    }
    function company_info()
    {
    	$id=$this->input->post('id');
    	$data['info']=$this->company_m->get_co_details($id);
    	echo json_encode($data);
    }

}