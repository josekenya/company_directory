<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Post extends CI_Controller
{

    function _construct()
    {
    	parent::_construct();

    }
	function posts()
	{
		if(!$this->ion_auth->logged_in())
		{ 
			//redirect('/'.$this->uri->segment(3));
			$slug=$this->uri->segment(2);
		    $data['page_title']='Search Company';
		    $data['client']=$this->company_m->client_company($slug);
			$this->template->load('basic_temp', 'client_templates/basic', $data);
		}
	}
}