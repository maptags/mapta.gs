<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    /* Load all static Pages */

    function index() {
        $this->load->view('main');
    }

    function cpright() {
        $this->load->view('site/copyright');
    }

    function howitswork() {
        $this->load->view('site/howitwork');
    }

    function contactus() {
        $this->load->view('site/contactus');
    }

    function faq() {
        $this->load->view('site/faq');
    }

    function satellitemap() {
        $this->load->view('site/map');
    }
    
    function staticPages($page){
        $this->load->view($page);
    }

    function contact_us() {

        $name = $this->input->post('val[name]');
        $email = $this->input->post('val[email]');
        $website = $this->input->post('val[website]');
        $cate = $this->input->post('val[cate]');
        $msg = $this->input->post('val[msg]');
        $g_recaptcha_response = $this->input->post('val[g-recaptcha-response]');
        $remote_ip = $this->input->server('REMOTE_ADDR');

        $this->config->load('GoogleCaptcha');
        $secret = $this->config->item('g_captcha_secret');
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $g_recaptcha_response . "&remoteip=" . $remote_ip);

        $json = json_decode($response, TRUE);
        if ($json['success'] == false) {
            echo '<div class="alert alert-danger" style="position:static; ">Something went wrong. Please refresh.</div>';
            print_r($json['error-codes']);
        } else {
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
				$email = array(
			        'html' => $email . ' Conatact with you <br/><b>Name:</b>' . $name . '<br><b>Email:</b>' . $email . '<br></b>Message:</b>' . $msg, //Consider using a view file
			        'text' => "Message from " . $name,
			        'subject' => "Message from " . $name,
			        'from_email' => $email . "<contact@mapta.gs>",
			        'from_name' => "Message from " . $name,
			        'to' => array(array('email' => 'contact@mapta.gs' )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );

			    $result = $this->mandrill->messages_send($email);
			}
/*            $this->email->set_mailtype("html");
            $subject = "Message from " . $name;
            $this->email->from($email . "<contact@mapta.gs>", "Contact us");
            $this->email->to('contact@mapta.gs');
            $this->email->subject($subject);
            $this->email->message($email . ' Conatact with you <br/><b>Name:</b>' . $name . '<br><b>Email:</b>' . $email . '<br></b>Message:</b>' . $msg);
            //$this->email->send();
             */
            echo '<div class="alert alert-success" style="position:static; ">Your mail has been sent  </div>';
        }
    }
    function buysell() {
    	
    	$sold_tags = $this->db->query("select * from maptagtransfer")->result();
    	$data['sold_tags'] = $sold_tags;
    	$this->load->view('site/buysell',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */