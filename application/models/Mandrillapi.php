<?php
class Mandrillapi extends CI_Model {
	private $mandrill_ready;
	function __construct() {
		parent::__construct();
		$this->load->library('mandrill');
		$this->mandrill_ready = NULL;
		try {
			    $this->mandrill->init('U-3wccGQlLyZxF_9n5Wbaw');
			    $this->mandrill_ready = TRUE;
			} catch(Mandrill_Exception $e) {
			    $this->mandrill_ready = FALSE;
			}
	}
	function sendEmail($email,$data,$template,$subject) {
		if($this->mandrill_ready) {
			$content = $this->load->view('email-templates/'.$template, $data, true);
			$email_content = array(
			        'html' => $content, //Consider using a view file
			        'text' => "",
			        'subject' => $subject,
			        'from_email' => 'contact@mapta.gs',
			        'from_name' => 'Maptags',
			        'important' => 'true',
			        'to' => array(array('email' => $email )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			
			    $result = $this->mandrill->messages_send($email_content);
		}
	}
	
}