<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
	}
	

	function index(){
		$this->load->view('main');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */