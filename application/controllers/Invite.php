<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invite extends CI_Controller {

	
	function __construct()
	{
		parent::__construct();
	}
	function friends() {
        session_start();
        if(!array_key_exists('user',$this->session->userdata())) {redirect("");};
        $this->config->load('googleAPI');        
        $client_id = $this->config->item('googleAPI_client_id');
        $redirect_uri = $this->config->item('googleAPI_redirect_uri');
        $string = "https://accounts.google.com/o/oauth2/auth?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&scope=https://www.google.com/m8/feeds&response_type=code&access_type=offline";        
		$this->load->model('Contacts','Invite_contacts');
		$this->Invite_contacts->loadContact($this->session->userdata('user'));        
		$data = array(
        'url'=>$string,
        'freinds'=>$this->Invite_contacts->getContacts(),
		'accesstoken'=>$this->getAccessToken()
        );
		$this->load->view('invite',$data);
	}
	    
	public function callback() {
        session_start();
        $this->config->load('googleAPI');
        $client_id = $this->config->item('googleAPI_client_id');
        $client_secret = $this->config->item('googleAPI_client_secret');
        $redirect_uri = $this->config->item('googleAPI_redirect_uri');

        $max_results = 1000;
        $auth_code = $_GET["code"];

        $fields = array(
            'code' => urlencode($auth_code),
            'client_id' => urlencode($client_id),
            'client_secret' => urlencode($client_secret),
            'redirect_uri' => urlencode($redirect_uri),
            'grant_type' => urlencode('authorization_code')
        );
        $post = '';
        foreach ($fields as $key => $value) {
            $post .= $key . '=' . $value . '&';
        }
        $post = rtrim($post, '&');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
        curl_setopt($curl, CURLOPT_POST, 5);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($result);
        $accesstoken = $response->access_token;
        $refreshtoken = null;

        if(isset($response->refresh_token)) file_put_contents(getcwd()."/assets/secrete/refresh_token.txt",$response->refresh_token);

//        $url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results=' . $max_results . '&oauth_token=' . $accesstoken;
//        $xmlresponse = $this->curl_file_get_contents($url);
//        if ((strlen(stristr($xmlresponse, 'Authorization required')) > 0) && (strlen(stristr($xmlresponse, 'Error ')) > 0)) { //At times you get Authorization error from Google.
//            echo "<h2>OOPS !! Something went wrong. Please try reloading the page.</h2>";
//            exit();
//        }

        $url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results=' . $max_results . '&alt=json&v=3.0&oauth_token=' . $accesstoken;
        $xmlresponse = $this->curl_file_get_contents($url);
        $temp = json_decode($xmlresponse, true);
		$this->load->model('Contacts','Invite_contacts');
		
		foreach ($temp['feed']['entry'] as $cnt) {
            if(!$this->validate_email($cnt['gd$email']['0']['address'])) {continue;}
			$url = urldecode($cnt['link']['0']['href'] . '&access_token=');
            $this->Invite_contacts->add($this->session->userdata('user'),$cnt['title']['$t'],$cnt['gd$email']['0']['address'],$url);
        	$this->Invite_contacts->processData();			
		}
        	redirect('/invite/friends');
	    }

    function curl_file_get_contents($url) {
        $curl = curl_init();
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';

        curl_setopt($curl, CURLOPT_URL, $url); //The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5); //The number of seconds to wait while trying to connect.	

        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent); //The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); //To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE); //To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($curl, CURLOPT_TIMEOUT, 10); //The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); //To stop cURL from verifying the peer's certificate.

        $contents = curl_exec($curl);
        curl_close($curl);
        return $contents;
    }
    
    function curl_file_get_contents_photo($url) {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url); //The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5); //The number of seconds to wait while trying to connect.	

        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); //To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE); //To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($curl, CURLOPT_TIMEOUT, 10); //The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); //To stop cURL from verifying the peer's certificate.

        $contents = curl_exec($curl);
        curl_close($curl);
        return $contents;
    }
    function sendinvite() {
    	$useremail = $this->input->post('email', true);
		$this->load->model('Contacts','Invite_contacts');
		$this->load->model('mandrillapi','mandrillService');
    	$member_id = $this->session->userdata('member_id');
		$profile = $this->db->query("select * from users where id='$member_id'")->result();
		$track_codes = $this->db->query("select * from custom_track where user_id='$member_id'")->result();
		$trackcode = '';
		if(!empty($track_codes)) $trackcode = $track_codes['0']->name; else $trackcode='';
		$this->mandrillService->sendEmail($useremail,array('email'=>$useremail,'maptag'=>$trackcode),'maptag-invite-template',$this->session->userdata('fname').' '.$profile[0]->lname.' wants you to go Address Free with Maptags , #addressrevolution begins');
		if($this->Invite_contacts->updateInvite($this->session->userdata('user'),$useremail)) {
				echo '{"code": "sucess"}';
		} else {
			echo '{"code": "faliour"}';
		}
    	exit;
    }
    function sendinviteemail() {
    	$useremail = $this->input->post('email', true);
    	$this->load->model('mandrillapi','mandrillService');
    	$member_id = $this->session->userdata('member_id');
		$profile = $this->db->query("select * from users where id='$member_id'")->result();
		$track_codes = $this->db->query("select * from custom_track where user_id='$member_id'")->result();
		$trackcode = '';
		if(!empty($track_codes)) $trackcode = $track_codes['0']->name; else $trackcode='';
		$this->mandrillService->sendEmail($useremail,array('email'=>$useremail,'maptag'=>$trackcode),'maptag-invite-template',$this->session->userdata('fname').' '.$profile[0]->lname.' wants you to go Address free with Maptags #addressrevolution begins');
    	echo '{"code": "Success"}';
    	exit;
    }
    function getAccessToken()  {
    	if(getcwd()."/assets/secrete/refresh_token.txt") 
    	$refreshtoken =  file_get_contents(getcwd()."/assets/secrete/refresh_token.txt"); 
    	else $refreshtoken = null;
        $this->config->load('googleAPI');
        $client_id = $this->config->item('googleAPI_client_id');
        $client_secret = $this->config->item('googleAPI_client_secret');
        $redirect_uri = $this->config->item('googleAPI_redirect_uri');

        $fields = array(
            'client_id' => urlencode($client_id),
            'client_secret' => urlencode($client_secret),
            'refresh_token' => urlencode($refreshtoken),
            'grant_type' => urlencode('refresh_token')
        );
        $post = '';
        foreach ($fields as $key => $value) {
            $post .= $key . '=' . $value . '&';
        }
        $post = rtrim($post, '&');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
        curl_setopt($curl, CURLOPT_POST, 5);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $result = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($result);
        return $response->access_token;
    }
    function validate_email($email){
   $mailparts=explode("@",$email);
   $server = explode(".",$mailparts[1]);
   $validemail = array('yahoo','gmail','hotmail','live'); 
   if(in_array($server[0],$validemail)) return true; else return false; 
    }
	
}
	
