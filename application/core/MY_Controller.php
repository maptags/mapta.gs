<?php

class MY_Controller extends CI_Controller
{
		function __construct ()
    {
        parent::__construct();
        
        // Check authentication
        $no_redirect = array(
                            'user/login','user/forgot_password','main','user/reset_password',
                            'user/register', 'user/social_login',
                            'user/endpoint','test/test','test/newtest',
                            'test/getSharedLocation', 'test/retriplecode'
                        );
        if ($this->session->userdata('logged_in') != true && ! in_array(uri_string(), $no_redirect)) {
            
            $this->session->set_flashdata('access-denied', 'You must be logged in to access this page');
            redirect('');
        }
        
    }
        
}