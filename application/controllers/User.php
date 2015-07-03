<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userdata('logged_in') != true) {
            $this->load->view('main');
        } else {
            $this->session->set_flashdata('result', 'You are already logged in');
            redirect('');
        }
    }

    public function login() {
        if ($this->session->userdata('logged_in') == true) {
            $this->session->set_flashdata('result', 'You are already logged in');
            redirect('');
        }
        if (!$this->input->post("signin")) {
            $this->load->view('users/login');
        }
        if ($this->input->post("signin")) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('pwd', 'Password', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('users/login');
            } else {

                $user_name = $this->input->post("email", true);
                $user_pass = md5($this->input->post("pwd", true));
                $login_query = $this->db->query("select * from `users` where email='$user_name' and password='$user_pass'");
                foreach ($login_query->result() as $login) {
                    $member_id = $login->id;
                    $email = $login->email;
                    $fname = $login->fname;
                    $profile_pic = $login->pic_link;
                }
                if ($login_query->num_rows() > 0) {
                    $users = array
                        (
                        'user' => $email,
                        'fname' => $fname,
                        'profile_pic' => $profile_pic,
                        'member_id' => $member_id,
                        'logged_in' => TRUE,
                        'logged' => 'site'
                    );
                    $this->session->set_userdata($users);
                    $data = array(
                        'last_logged_ip' => $this->input->ip_address(),
                        'last_logged_date' => date('Y-m-d H:i:s'),
                    );
                    $id = $this->session->userdata('member_id');
                    $this->db->where('id', $id);
                    $this->db->update('users', $data);
                    $this->session->set_flashdata('result', 'You have been successfully been logged in');
                    redirect('');
                    return TRUE;
                } else {
                    $this->session->set_flashdata('result', 'Invalid user name or password');
                    redirect('user/login');
                    return FALSE;
                }
            }
        }
    }

    public function logins() {
        if ($this->session->userdata('logged_in') == true) {
            $this->session->set_flashdata('result', 'You are already logged in');
            redirect('');
        }
        if (!$this->input->post("signin")) {
            $this->load->view('users/logins');
        }
    }

    public function login_imidiate($provider, $user_name, $user_pass = 'kh361010!') {
        if ($this->session->userdata('logged_in') == true) {
            $this->session->set_flashdata('result', 'You are already logged in');
            redirect('');
        }

        $user_pass = md5($user_pass);
        $login_query = $this->db->query("select * from `users` where email='$user_name' and password='$user_pass' and status=1 ");
        foreach ($login_query->result() as $login) {
            $member_id = $login->id;
            $email = $login->email;
            $fname = $login->fname;
            $profile_pic = $login->pic_link;
        }
        if ($login_query->num_rows() > 0) {
            $users = array(
                'user' => $email,
                'fname' => $fname,
                'profile_pic' => $profile_pic,
                'member_id' => $member_id,
                'logged_in' => TRUE,
                'logged' => 'social',
                'provider' => $provider
            );
            $this->session->set_userdata($users);
//echo $this->input->ip_address();
            $data = array(
                'last_logged_ip' => $this->input->ip_address(),
                'last_logged_date' => date('Y-m-d H:i:s'),
            );
            $id = $this->session->userdata('member_id');
            $this->db->where('id', $id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('result', 'You have been successfully been logged in');
            redirect('');
            return TRUE;
        } else {
            $this->session->set_flashdata('result', 'Invalid user name or password');
            redirect('user/login');
            return FALSE;
        }
    }

    public function register() {
        if ($this->session->userdata('logged_in') == true) {
            $this->session->set_flashdata('result', 'You are already logged in');
            redirect('');
        }
        if (!$this->input->post("register")) {
            $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
//$data['page'] = 'login/login';
            $this->load->view('users/register', $data);
        }
        if ($this->input->post("register")) {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('pwd', 'Password', 'required|matches[vpwd]|trim');
            $this->form_validation->set_rules('vpwd', 'Verify Password', 'required|trim|matches[pwd]');
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
            $this->form_validation->set_rules('country', 'Country', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
                $this->load->view('users/register', $data);
            } else {

                $email = $this->input->post("email", true);
//echo $email;
                $pwd = $this->input->post("pwd", true);
                $fname = $this->input->post("fname", true);
                $lname = $this->input->post("lname", true);
                $gender = $this->input->post("gender", true);
                $country = $this->input->post("country", true);

                $g_recaptcha_response = $this->input->post('g-recaptcha-response');
                $remote_ip = $this->input->server('REMOTE_ADDR');

                $this->config->load('GoogleCaptcha');
                $secret = $this->config->item('g_captcha_secret');
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $g_recaptcha_response . "&remoteip=" . $remote_ip);

                $json = json_decode($response, TRUE);
                if ($json['success'] == TRUE) {
                    if ($this->input->cookie('tracker-refrrer') == TRUE) {

                        $tracker_id = $this->input->cookie('tracker-id');
                    } else {

                        $tracker_id = 0;
                    }
// below Array is used for inserting data to the user_login table...
                    $register_data = array(
                        'id' => '',
                        'email' => $email,
                        'password' => md5($pwd),
                        'fname' => $fname,
                        'lname' => $lname,
                        'gender' => $gender,
                        'country' => $country,
                        'refferby' => $tracker_id,
                        'last_logged_ip' => $this->input->ip_address(),
                    );
// Below query is used for checking user existence...

                    $check_user = $this->db->query("select * from `users` where email='$email'");
//                    $this->recaptcha->recaptcha_check_answer();
//                    if (!$this->recaptcha->getIsValid()) {
//                        $this->session->set_flashdata('recaptcha', 'Incorrect captcha');
//                        redirect('user/register');
//                        return FALSE;
//                    }
                    if ($check_user->num_rows() == 0) {

                        $this->db->insert('users', $register_data);

                        $res = $this->db->affected_rows();
                        if ($res == 0) {

                            $this->session->set_flashdata('result', 'We already have you....Click here to <a href=' . base_url() . 'user/login' . '>Login</a>');
                            redirect('user/register');
                            return FALSE;
                        } else {
                            $user_id = $this->db->insert_id();

                            $credits_data = array(
                                'id' => '',
                                'credit_earn' => '0',
                                'credit_used' => '0',
                                'credit_left' => '0',
                                'user_id' => $user_id,
                            );
                            $this->db->insert('user_credits', $credits_data);

                            $code = md5($email);
                            $confirm = array(
                                'id' => '',
                                'userid' => $user_id,
                                'email' => $email,
                                'code' => $code
                            );
                            $this->db->insert('confirm', $confirm);
                            /* Register Email */
                            
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
				$this->data['email'] = $email;
	            $this->data['fname'] = $fname;
	            $this->data['lname'] = $lname;
				$this->data['code'] = $code;
                $content = $this->load->view('email-templates/varification-message', $this->data, true);
				
				$email_content = array(
			        'html' => $content, //Consider using a view file
			        'text' => "Maptags Account verification",
			        'subject' => "Hi ".$fname.", Maptags Account verification ",
			        'from_email' => 'contact@mapta.gs',
			        // 'from_name' => "Hi".$fname." ".$lname,
			        'from_name' => 'Maptags',
			        'important' => 'true',
			        'to' => array(array('email' => $email )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			
			    $result = $this->mandrill->messages_send($email_content);
			} 

/*                            $this->email->set_mailtype("html");
                            $subject = "Maptags Account verification ";
                            $this->email->from("contact@mapta.gs", "Maptags Account verification");
                            $this->email->to($email);
                            $this->email->subject($subject);
                         
                          $this->email->message($content);
                            $this->email->send();
*/                           
                            $this->session->set_flashdata('register', 'Thanks for registering on Maptags, please check your inbox ( or spam box ) for an activation link from <a href="mailto:contact@mapta.gs">contact@mapta.gs</a> .... We are waiting for you !!!');
                            redirect('user/register');
                            return TRUE;
                        }
                    } else {
                        $this->session->set_flashdata('result-1', "We already have you....Click here to <a href='user/login'>Login</a>");
                        redirect('user/register');
                        return True;
                    }
                } else {
                    $this->session->set_flashdata('result-1', "We already have you....Click here to <a href='user/login' >Login</a>");
                    redirect('user/register');
                }
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('user/login');
    }

    public function varify() {
        $email = $this->input->get("email", true);
        $code = $this->input->get("code", true);
        $fname = $this->input->get("fname", true);
        $lname = $this->input->get("lname", true);
        $con = $this->db->query("SELECT * FROM `confirm` WHERE `email` = '$email' AND `code` = '$code' LIMIT 1");
        if ($con->num_rows() !== 0) {
            $get_value = $con->row();
            $u_id = $get_value->userid;
            $this->db->query("UPDATE `users` SET `status` = 1 WHERE `id` = '$u_id' LIMIT 1");
            $this->db->query("DELETE FROM `confirm` WHERE `userid` = '$u_id' LIMIT 1");
            $this->session->set_flashdata('result', 'Thanks for signing up ,make sure you check your welcome email from contact@mapta.gs , we have an exciting present inside waiting for you');

			$this->load->library('mandrill');
			$mandrill_ready = NULL;
			try {
			    $this->mandrill->init(MANDRILL_API_KEY);
			    $mandrill_ready = TRUE;
			
			} catch(Mandrill_Exception $e) {
			    $mandrill_ready = FALSE;
			}
            
            if ($this->input->cookie('tracker-refrrer') == TRUE) {
//echo "credit earn";
                $tracker_id = $this->input->cookie('tracker-id');
                $tracker_name = $this->input->cookie('tracker-name');

                $user_credits = $this->db->query("select * from user_credits where user_id='$tracker_id'");
                $user_credit = $user_credits->row();
                $new_credit = $user_credit->credit_earn + 1;
                $credit_used = $user_credit->credit_used;
                $credit_left = $new_credit - $credit_used;
                $this->db->query("update user_credits set credit_earn = '$new_credit',credit_used = '$credit_used',credit_left = '$credit_left' where user_id='$tracker_id'");
                $credits_source = array(
                    'id' => '',
                    'user_id' => $tracker_id,
                    'email' => $email,
                    'fname' => $fname,
                    'lastname' => $lname,
                    'current_id' => $u_id,
                    'earn_date' => date('Y-m-d')
                );
                $this->db->insert('credit_source', $credits_source);

                $user_rec = $this->db->query("select * from users where id='$tracker_id'");
                $row = $user_rec->row();
			if( $mandrill_ready ) {
				//Send us some email!
					$data['from'] = $fname . " " . $lname;
					$data['email'] = $row->email;
                	$content1 = $this->load->view('email-templates/reffer-template', $data, true);
			        
					$email_content1 = array(
			        'html' => $content1, //Consider using a view file
			        'text' => $row->fname." you are a Hero , ".$fname." ".$lname." signed up",
			        'subject' => $row->fname." you are a Hero , ".$fname." ".$lname." signed up",
			        'from_email' => 'contact@mapta.gs',
			        // 'from_name' => "Hi ".$row->fname,
			        'from_name' => 'Maptags',
					'important' => 'true',
			        'to' => array(array('email' => $row->email )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			    $result1 = $this->mandrill->messages_send($email_content1);	
			} 
                
/*                $this->email->set_mailtype("html");
                $subject = "Welcome to Maptags";
                $this->email->from("contact@mapta.gs", "Welcome to Maptags");
                $this->email->to($email);
                $this->email->subject($subject);
                $content = $this->load->view('email-templates/welcome-message', false, true);
                $this->email->message($content);
                $this->email->send();
                $this->email->set_mailtype("html");
                $subject = "You are a Hero , your friend signed up";
                $this->email->from("contact@mapta.gs", "You are hero , your friend signed up");
                $this->email->to($row->email);
                $this->email->subject($subject);
                $data['from'] = $fname . " " . $lname;
                $content = $this->load->view('email-templates/reffer-template', $data, true);
                $this->email->message($content);
                $this->email->send();
*/              
            }
			if($mandrill_ready) {
            	$this->data['email'] = $email;
	            $this->data['fname'] = $fname;
	            $this->data['lname'] = $lname;
				$this->data['code'] = $code;
                $content = $this->load->view('email-templates/welcome-message', $this->data, true);
								
				$email_content = array(
			        'html' => $content, //Consider using a view file
			        'text' => "Welcome to Maptags",
			        'subject' => "Hi ".$fname.", Welcome to Maptags",
			        'from_email' => 'contact@mapta.gs',
			        // 'from_name' => "Hi ".$fname." ".$lname,
			        'from_name' => 'Maptags',
					'important' => 'true',
			        'to' => array(array('email' => $email )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			    $result = $this->mandrill->messages_send($email_content);				      
			}
            redirect("user/login");
            return TRUE;
        } else {
            $this->session->set_flashdata('result', 'Account already activated or inavlid Email or Code');
            redirect("user/login");
            return TRUE;
        }
    }

    public function forgot_password() {
        if (!$this->input->post("forgot")) {
            $this->load->view('users/forgot_password');
        }
        if ($this->input->post("forgot")) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
//$this->form_validation->set_rules('pass', 'Password', 'required|trim');
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('users/forgot_password');
            } else {
                $user = $this->input->post("email", true);
                $email_query = $this->db->query("select * from `users` where email='$user'");
                if ($email_query->num_rows() > 0) {

                    $code = md5(rand(5, 15));
                    $confirm = array(
                        'id' => '',
                        'email' => $user,
                        'code' => $code
                    );
                    $this->db->insert('reset_password', $confirm);
                    $subject = "Maptags Password Reset";
                    $this->email->set_mailtype("html");
                    $this->email->from("contact@mapta.gs", "Maptags Password Reset");
                    $this->email->to($user);
                    $this->email->subject($subject);
                    $this->email->message('<b>Click the link below to reset your Password.<b><br/><br/>
											<br/> 
											<a href=' . base_url() . "user/reset_password?email=" . $user . '&code=' . $code . '>Activate Account</a>');
                    $this->email->send();
                    $this->session->set_flashdata('result', 'Email sent check your email!');
                    redirect('user/forgot_password');
                } else {
                    $this->session->set_flashdata('result', 'Account not found');
                    redirect('user/forgot_password');
                }
            }
        }
    }

    public function reset_password() {

        if (!$this->input->post("reset")) {
            $this->load->view('users/reset_password');
        }
        if ($this->input->post("reset")) {
            $email = $this->input->get("email", true);
            $code = $this->input->get("code", true);
            $password = $this->input->post("password", true);
            $vpassword = $this->input->post("vpassword", true);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[vpassword]');
            $this->form_validation->set_rules('vpassword', 'Verfiy Password', 'required|trim|matches[password]');
            if ($this->form_validation->run() == FALSE) {

                $this->load->view('users/reset_password');
            } else {
                $enc_pass = md5($password);
                $email_query = $this->db->query("select * from `reset_password` where email='$email' and code='$code'");
                if ($email_query->num_rows() > 0) {
                    $reset = $this->db->query("update users set password='$enc_pass' where email='$email'");
                    $this->db->query("DELETE FROM `confirm` WHERE `email` = '$email' LIMIT 1");
                    $this->session->set_flashdata('result', 'Password Reset !');
                    redirect('user/reset_password');
                } else {
                    $this->session->set_flashdata('result', 'Account not found');
                    redirect('user/reset_password');
                }
            }
        }
    }

    public function my_profile() {
        if ($this->session->userdata('logged_in') != true) {
            redirect('');
        }
        $member_id = $this->session->userdata('member_id');
        $data['profile_data'] = $this->db->query("select * from users where id='$member_id'")->result();
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        $this->load->view("users/profile", $data);
    }

    public function update_profile() {
        if ($this->session->userdata('logged_in') != true) {
            redirect('');
        }
        $member_id = $this->session->userdata('member_id');
        if (!$this->input->post("update_profile")) {
            $data['profile_data'] = $this->db->query("select * from users where id='$member_id'")->result();
            $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
//$data['page'] = 'login/login';
            $this->load->view('users/profile', $data);
        }
        if ($this->input->post("update_profile")) {
            $this->form_validation->set_rules('fname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('country', 'Country', 'required|trim');
            $this->form_validation->set_rules('gender', 'Gender', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $data['profile_data'] = $this->db->query("select * from users where id='$member_id'")->result();
                $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
                $this->load->view('users/profile', $data);
                return FALSE;
            } else {

                $name = addslashes($this->input->post("fname", true));
                $lname = addslashes($this->input->post("lname", true));
                $email = addslashes($this->input->post("email", true));
                $country = $this->input->post("country", true);
                $gender = $this->input->post("gender", true);
                $pass = $this->input->post("pwd", true);

                $config['upload_path'] = './profiles/';
                $config['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $data = $this->upload->data();
                    $new_pic = array(
                        'profile_pic' => base_url() . 'profiles/' . $data['file_name'],
                    );
                    $this->session->set_userdata($new_pic);
                }
            }
            $profile_img = $this->db->query("select * from users where id='$member_id'");
            if ($profile_img->num_rows() > 0) {
                $row = $profile_img->row();
                $profle_pic_link = $row->pic_link;
            }
// below Array is used for inserting data to the user_login table...
            if (empty($_FILES['userfile']['name'])) {
                $newpic = $profle_pic_link;
            } else {
                $newpic = base_url() . 'profiles/' . $data['file_name'];
            }

            if (empty($pass)) {

                $register_data = array(
                    'email' => $this->db->escape_str($email),
                    'fname' => $this->db->escape_str($name),
                    'lname' => $this->db->escape_str($lname),
                    'country' => $country,
                    'gender' => $gender,
                    'pic_link' => $this->db->escape_str($newpic)
                );
            } else {

                $register_data = array(
                    'password' => md5($pass),
                    'email' => $this->db->escape_str($email),
                    'fname' => $this->db->escape_str($name),
                    'lname' => $this->db->escape_str($lname),
                    'country' => $country,
                    'gender' => $this->db->escape_str($gender),
                    'gender' => $gender,
                    'pic_link' => $newpic
                );
            }
// Below query is used for checking user existence...

            $this->recaptcha->recaptcha_check_answer();
            if (!$this->recaptcha->getIsValid()) {
                $this->session->set_flashdata('recaptcha', 'Incorrect captcha');
                redirect('user/my_profile');
                return FALSE;
            }
            $this->db->where('id', $member_id);
            $this->db->update('users', $register_data);
            $res = $this->db->affected_rows();
            if ($res == 0) {
                $this->session->set_flashdata('result', 'Profile Not Updated');
                redirect('user/my_profile');
                return FALSE;
            } else {
                $this->session->set_flashdata('result', 'Profile updated');
                redirect('user/my_profile');
                return TRUE;
            }
        }
    }

    public function social_login($provider) {
        try {
            if ($this->hybridauthlib->providerEnabled($provider)) {
                $service = $this->hybridauthlib->authenticate($provider);

                if ($service->isUserConnected()) {
                    if (isset($_GET['logout'])) {

                        if (isset($service)) {
                            $service->logout();
                            $this->logout();
                        }
                    }
                    $user_profile = $service->getUserProfile();

//print_r($user_profile);exit;

                    $idn = $user_profile->identifier;
                     $email = $user_profile->email;
                    if ($email == '') { //Thejan 14-04-2015 check for the empty email addresses
                        return FALSE;
                    }  //Thejan edit end
                    $check_user = $this->db->query("select * from `users` where email='$email'");
                    $check_google = $this->db->query("select * from `users` where check_google='$idn'");
//if( $check_google->num_rows() > 0 ) {
                    if (( $check_user->num_rows() > 0 ) || ( $check_google->num_rows() > 0 )) {
                        $login_query = $this->db->query("select * from `users` where email='$email'");
                        foreach ($login_query->result() as $login) {
                            $member_id = $login->id;
                            $email = $login->email;
                            $fname = $login->fname;
                            $profile_pic = $login->pic_link;
                        }
                        $users = array
                            (
                            'user' => $email,
                            'fname' => $fname,
                            'profile_pic' => $profile_pic,
                            'member_id' => $member_id,
                            'logged_in' => TRUE,
                            'provider' => $provider,
                            'logged' => 'social'
                        );
                        
                        $this->session->set_userdata($users);
                        $this->session->set_flashdata('result', 'You have been successfully been logged in');
                        redirect('');

                        $this->session->set_flashdata('result', 'logged in');
                        redirect('user/login');
                        return TRUE;
                    }
                    if ($check_user->num_rows() == 0) {
                        if ($this->input->cookie('tracker-refrrer') == TRUE) {
                            $tracker_id = $this->input->cookie('tracker-id');
                        } else {
                            $tracker_id = 0;
                        }
                        $register_data = array(
                            'id' => '',
                            'email' => $user_profile->email,
                            'password' => md5('kh361010!'),
                            'fname' => $user_profile->firstName,
                            'lname' => $user_profile->lastName,
                            'gender' => $user_profile->gender,
                            'pic_link' => $user_profile->photoURL,
                            'country' => $user_profile->country,
                            'check_google' => $user_profile->identifier,
                            'refferby' => $tracker_id,
                            'last_logged_ip' => $this->input->ip_address(),
                            'status'=>1
                        );                      
                        $this->db->insert('users', $register_data);
                        $user_id = $this->db->insert_id();
                        $credits_data = array(
                            'id' => '',
                            'credit_earn' => '0',
                            'credit_used' => '0',
                            'credit_left' => '0',
                            'user_id' => $user_id,
                        );
                        $this->db->insert('user_credits', $credits_data);
                        $res = $this->db->affected_rows();
                        if ($res == 0) {
                            $this->session->set_flashdata('register-er', 'We already have you....Click here to <a href=' . base_url() . 'user/login' . '>Login</a>');
                            redirect('user/register');
                            return FALSE;
                        } else {
							$this->load->library('mandrill');
							$mandrill_ready = NULL;
								try {
								    $this->mandrill->init(MANDRILL_API_KEY);
								    $mandrill_ready = TRUE;
								
								} catch(Mandrill_Exception $e) {
								    $mandrill_ready = FALSE;
								}
                            if ($this->input->cookie('tracker-refrrer') == TRUE) {

                            	$tracker_id = $this->input->cookie('tracker-id');
                                $tracker_name = $this->input->cookie('tracker-name');

                                $user_credits = $this->db->query("select * from user_credits where user_id='$tracker_id'");
                                $user_credit = $user_credits->row();
                                $new_credit = $user_credit->credit_earn + 1;
                                $credit_used = $user_credit->credit_used;
                                $credit_left = $new_credit - $credit_used;
                                $this->db->query("update user_credits set credit_earn = '$new_credit',credit_used = '$credit_used',credit_left = '$credit_left' where user_id='$tracker_id'");
                                $credits_source = array(
                                    'id' => '',
                                    'user_id' => $tracker_id,
                                    'email' => $email,
                                    'fname' => $user_profile->firstName,
                                    'lastname' => $user_profile->lastName,
                                    'current_id' => $user_id,
                                    'earn_date' => date('Y-m-d')
                                );
                                $this->db->insert('credit_source', $credits_source);
                                $user_rec = $this->db->query("select * from users where id='$tracker_id'");
                                $row = $user_rec->row();

								if( $mandrill_ready ) {
				//Send us some email!
                					$data['from'] = $email;
                					$data['email'] = $row->email;
                					$content = $this->load->view('email-templates/reffer-template', $data, true);
									$email_temp = array(
			        							'html' => $content, //Consider using a view file
										        'text' => $row->fname." you are a Hero , ".$fname." ".$lname." signed up",
										        'subject' => $row->fname." you are a Hero , ".$fname." ".$lname." signed up",
										        'from_email' => 'contact@mapta.gs',
										        // 'from_name' => "Hi ".$row->fname,
										        'from_name' => 'Maptags',
												'important' => 'true',
										        'to' => array(array('email' => $row->email )) //Check documentation for more details on this one
										        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
										        );
								    $result = $this->mandrill->messages_send($email_temp);	
								}
                                

/*                                $this->email->set_mailtype("html");
                                $subject = "You are a hero, your friend signed up";
                                $this->email->from("contact@mapta.gs", "You are a hero, your friend signed up");
                                $this->email->to($row->email);
                                $this->email->subject($subject);
                                $data['from'] = $email;
                                $content = $this->load->view('email-templates/reffer-template', $data, true);
                                $this->email->message($content);
                                $this->email->send();
*/                           
                            }
			if( $mandrill_ready ) {
				//Send us some email!
				$data['email'] = $email;
    	        $content = $this->load->view('email-templates/welcome-message', $data, true);												
				$send_email = array(
			        'html' => $content, //Consider using a view file
			        'text' => "Welcome to Mapta.gs",
			        'subject' => "Hi ".$user_profile->firstName.", Welcome to Maptags the worlds easiest address sharing platform",
			        'from_email' => 'contact@mapta.gs',
			        // 'from_name' => "Hi ".$user_profile->firstName,
			        'from_name' => 'Maptags',
					'important' => 'true',
			        'to' => array(array('email' => $email )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			    $result = $this->mandrill->messages_send($send_email);	
			}
                            
                            
             /*               $this->email->set_mailtype("html");
                            $subject = "Welcome to Mapta.gs";
                            $this->email->from("contact@mapta.gs", "Welcome to Mapta.gs");
                            $this->email->to($email);
                            $this->email->subject($subject);
                            $content = $this->load->view('email-templates/welcome-message', false, true);
                            $this->email->message($content);
                            $this->email->send();
              */

                            $this->login_imidiate($provider, $user_profile->email);
                            /* $this->session->set_flashdata('register', 'Thanks for signing up!');
                              redirect('user/register'); */
                            return TRUE;
                        }
                    } else {
                        $this->session->set_flashdata('register', 'We already have you....Click here to <a href=' . base_url() . 'user/login' . '>Login</a>');
//exit("12345");
//redirect('user/register');
                        redirect(''); //added by venkat
                        return true;
                    }
                } else { // Cannot authenticate user
                    return FALSE; //show_error('Cannot authenticate user');
                }
            } else { // This service is not enabled.
                show_404($_SERVER['REQUEST_URI']);
            }
        } catch (Exception $e) {
            $error = 'Unexpected error';
            switch ($e->getCode()) {
                case 0 : $error = 'Unspecified error.';
                    break;
                case 1 : $error = 'Hybriauth configuration error.';
                    break;
                case 2 : $error = 'Provider not properly configured.';
                    break;
                case 3 : $error = 'Unknown or disabled provider.';
                    break;
                case 4 : $error = 'Missing provider application credentials.';
                    break;
                case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
//redirect();
                    if (isset($service)) {
                        $service->logout();
                    }

                    show_error('User has cancelled the authentication or the provider refused the connection.');
                    break;
                case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                    break;
                case 7 : $error = 'User not connected to the provider.';
                    break;
            }

            if (isset($service)) {
                $service->logout();
            }

            show_error('Error authenticating user.');
        }
    }

    public function endpoint() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $_GET = $_REQUEST;
        }
        require_once APPPATH . '/third_party/hybridauth/index.php';
    }
    
    public function checkNotActivatedUsers() { //Added by Thejan 
        $this->load->helper('date');
        $this->load->database();

        $today = new DateTime(unix_to_human(now()));
        $this->db->select('email, last_logged_date');
        $this->db->from('users');
        $this->db->where('status', 0);
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            $registeredDate = new DateTime($row->last_logged_date);
            $interval = $today->diff($registeredDate);
            if ($interval->days == 1) {
                //Here send the email to the user
                $this->sendEmailRemainder($row->email);
            }
        }
    }
    public function unsubscribe() {
    	$email = $this->input->get("email");
		$list = $this->input->get("lists");
		$update = $this->input->get("update");
    	if($email==null) redirect('');
    	$transactionmail  = 0;
    	$promotionalmail = 0;
    	$userID = null;        
		$email_query = $this->db->query("select * from `users` where email='$email'");
		if ($email_query->num_rows() > 0) {
        	foreach ($email_query->result() as $rs) {
        		$userID = $rs->id;
        	}
        } else {
 			$this->load->view('users/login');
 			return;
        } 
        $data = array(
                        'id' => '',
                        'email' => $email,
        				'userid' =>$userID,
        				'transactionmail' => in_array(1, $list)?1:$transactionmail,
        				'promotionalmail' => in_array(2, $list)?1:$promotionalmail
                    );
    	$email_query1 = $this->db->query("select * from `unsubscribe` where email='$email'");                
    	$res = $email_query1->result();
		
    	if($email_query1->num_rows()!=0 && !isset($update)) {
    		foreach ($res as $r) {
    			$data['transactionmail'] = in_array(1, $list)?1:$r->transactionmail;
    			$data['promotionalmail'] = in_array(2, $list)?1:$r->promotionalmail;
    			
    		}	
    	}

    	if($email_query1->num_rows()==0) {
    		$this->db->insert('unsubscribe', $data);
    	}else if($update==1) {
 			foreach ($res as $emq) {
 			$data['id']=$emq->id;
			$this->db->where('ID', $emq->id);
    		$this->db->update('unsubscribe', array(
                     	'transactionmail' => in_array(1, $list)?1:0,
        				'promotionalmail' => in_array(2, $list)?1:0
                    )); 			
 			}
  		}
 		$this->load->view('users/unsubscribe',$data);
    }
 

    private function sendEmailRemainder($email) {
        //$this->load->library('email');
        $this->load->library('mandrill');
		$mandrill_ready = NULL;
		try {
		    $this->mandrill->init(MANDRILL_API_KEY);
		    $mandrill_ready = TRUE;
		
		} catch(Mandrill_Exception $e) {
		    $mandrill_ready = FALSE;
		}
    	
        $this->load->database;

        $this->db->select('fname, lname');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $result = $query->result();

        if ($query->num_rows() > 0) {
            $data = array(
                'fname' => $result[0]->fname,
                'lname' => $result[0]->lname,
                'code'=> md5($email),
                'email'=>$email
            );
            if( $mandrill_ready ) {
				//Send us some email!
                $data['from'] = $email;
            	$content = $this->load->view('email-templates/remainder-message', $data, true);
                				
				$email_temp = array(
				        	'html' => $content, //Consider using a view file
					        'text' => "Hi ".$result[0]->fname.", Welcome to Maptags",
					        'subject' => "Hi ".$result[0]->fname.", Reminder to Please verify you Maptags Account",
					        'from_email' => 'contact@mapta.gs',
					        // 'from_name' => "Hi ".$result[0]->fname,
					        'from_name' => 'Maptags',
							'important' => 'true',
					        'to' => array(array('email' => $email )) //Check documentation for more details on this one
					        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
					        );
			    $result = $this->mandrill->messages_send($email_temp);	
			}
            
            
/*            $this->email->set_mailtype("html");
            $subject = "Welcome to Mapta.gs";
            $this->email->from("contact@mapta.gs", "Welcome to Mapta.gs");
            $this->email->to($email);
            //$this->email->to('coder.clix@gmail.com'); //Testing
            $this->email->subject($subject);
            $content = $this->load->view('email-templates/remainder-message', $data, true);
            $this->email->message($content);
            $this->email->send();
            */
        }
        
    }
    	public function isactiveuser() {

		if($this->session->userdata('logged_in') == true) {
			echo "{\"code\": 1}";
		} else {
			echo "{\"code\": 0}";
		}
		exit;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */