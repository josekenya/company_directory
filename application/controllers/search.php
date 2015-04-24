<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{
	function _construct()
	{
		parent::_construct();
	}
	function index()
	{
		$data=array('page_title'=>'Search here');
		$this->template->load('home', 'pages/search_home_v', $data);
	}
}