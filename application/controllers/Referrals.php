<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Referrals extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		
    	
		redirect('');
		
	}
	/*Send Referr Link with Maptag to all emails*/
	public function send_refferrer_link()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('members/track-refferrer');
		}
		else {

			$name=$this->input->post("name",true);
			$email=$this->input->post("email",true);
			$ref_name=$this->input->post("ref_name",true);
			$this->load->library('mandrill');
				$mandrill_ready = NULL;
			try {
			    $this->mandrill->init(MANDRILL_API_KEY);
			    $mandrill_ready = TRUE;
			
			} catch(Mandrill_Exception $e) {
			    $mandrill_ready = FALSE;
			}
			if( $mandrill_ready ) {
				//Send us some email!
			$data['name'] = $name;
			$data['ref_name'] = $ref_name;
			$data['email'] = $email;
 			$content = $this->load->view('email-templates/signup-template',$data,true);
			
				$email = array(
			        'html' => $content, //Consider using a view file
			        'text' => "Hi ".$name,
			        'subject' => "Hi ".$name.", You have been Refferrer ",
			        'from_email' => 'contact@mapta.gs',
			        'from_name' => "Hi ".$name,
			        'to' => array(array('email' => $email )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			
			}
			
			/*$this->email->set_mailtype("html");
			$this->email->from("contact@mapta.gs", "You have been Refferrer");
			$this->email->to($email);
			$this->email->subject('You have been Refferrer');
			$data['name'] = $name;
			$data['ref_name'] = $ref_name;
			$content = $this->load->view('email-templates/signup-template',$data,true);
			$this->email->message($content);	
			$this->email->send($content);*/
			$this->session->set_flashdata('result', 'Invitation Has been sent');
			redirect('actions/my_track_codes');
	}
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */