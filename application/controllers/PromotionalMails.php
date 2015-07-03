 <?php
	class PromotionalMails extends CI_Controller
    {
        public function __construct()
        {
        	parent::__construct();
        }

        public function index()
        {
        	ini_set('max_execution_time', 0);
            /*Find Users who have not created a maptag yet*/
            $user_list = $this->db->query("SELECT fname, email,maptagname FROM inactiveuser where id >901 and id < 1001 ");
            if (!$user_list) {
                /*Handle Error Case Incase Query Fails
                 *Check if this is handled correctly*/
                $this->error = $this->db->_error_message();
                $this->errorno = $this->db->_error_number();
                return false;
            }
            //lets filter promomail users here.
            $userlist = $user_list->result();
			$saynoPromo = $this->db->query("SELECT email FROM unsubscribe where promotionalmail > 0");
            $userlist = $this->filteruserlist($userlist,$saynoPromo->result());
            //back to work with user list $userlist
/*			foreach ($user_list->result() as $user) {
				$insert_arr  = array(
									'fname' => $user->fname, 
									'email' => $user->email, 
								);
			$this->db->insert('inactiveuser',$insert_arr);				
			}*/
			
			//echo "<pre>";print_r($user_list->result());exit;

            $this->load->library('mandrill');
			$mandrill_ready = NULL;
			try {
			    $this->mandrill->init(MANDRILL_API_KEY);
			    $mandrill_ready = TRUE;
			
			} catch(Mandrill_Exception $e) {
			    $mandrill_ready = FALSE;
			}
			if ($mandrill_ready == FALSE) {
                /*Some Error Logging*/
                return FALSE;
            }
			
            /*Now For each Id send a mail asking them to create a Maptag!*/
            foreach ($userlist as $user) {
                 //$this->sendEmail($user['email'], $user['fname']);
				 
				 $user_email = $user->email;
				 $user_fname = $user->fname;
                                 $user_maptagname = $user->maptagname;
				 $data = array(
				 	'name' => $user_fname,
				 	'email' => $user_email , 'maptagname' => $user_maptagname
				 );
				 $content =  $this->load->view('email-templates/inviteothers', $data, true);
			    
                /*Pause for a while before sending the next mail*/
				$email_temp = array(
					'html' => $content, //Consider using a view file
					'text' => "",
	'subject' => " Don't lose your Maptags, act now   ",
					'from_email' => 'contact@mapta.gs',
					'from_name' => 'Maptags',
					'to' => array(array('email' => $user_email, 'name' => $user_fname))
				);
				$result = $this->mandrill->messages_send($email_temp);
            //    sleep(10);
            }
        }
        /*Connect with Mandrill API and send email*/
        protected function sendEmail($user_email, $user_fname)
        {
            
            

			
            
            
        }

        /*Initialize Mandrill API*/
        protected function initMandrill(&$mandrill_ready)
        {
            $this->load->library('mandrill');
            try {
                $this->mandrill->init(MANDRILL_API_KEY);
                $mandrill_ready = TRUE;
            } catch (Mandrill_Exception $e) {
                $mandrill_ready = FALSE;
            }
        }
        public function filteruserlist($userlist,$emails) {
        	$emaillist = array();
        	foreach ($emails as $em) {
        		$emaillist[] = $em->email;	
        	}
			$newuser = array();
        	foreach ($userlist as $user) {
        		if(in_array($user->email,$emaillist)) {
        			continue;
        		}else {
        			$newuser[] = $user;		
        		}
        	}
        return $newuser;
        }
       public function test() {
		$this->load->library('SMTP_validateEmail','','smtp1');
		$result = $this->smtp1->validate(array('princeseth2006@gmail.com'),'localhost@localhost');
		if($result['princeseth2006@gmail.com']) echo "hi";else echo "bye";
       	echo "hi";exit;
       }
    }
 ?>