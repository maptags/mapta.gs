<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	/* search Maptag and display Result in Popup*/
	public function getSharedLocation()
	{
		
		$loc_code = $this->input->post('data',true);
		$query = "SELECT * FROM custom_track WHERE name='$loc_code' ";
		$res = $this->db->query($query);
		if($res->num_rows() > 0){
			foreach ($res->result() as $k) {
				$k->fname = $this->findmyname($k->user_id);
				unset($res->user_id);
				echo json_encode($k);
			}
			
		}else{
			$ret=0;
			echo '{"code": '.$ret.'}';
		}
		exit;
	}
	/*  Get user Name.
		@param $id
		return user first name
	*/
	public function findmyname($id){
		$res = $this->db->query("SELECT fname FROM users WHERE id=$id");
		$user = $res->row();

		return $user->fname;
	}
	/* Add the maptag in database*/
	public function add_track_code()
	{
		$uid = $this->input->post('u_id',true);
		$lat = $this->input->post('lat',true);
		$lng = $this->input->post('lng',true);
		$track = $this->input->post('place',true);
		$address= $this->input->post('address',true);
		$address1= $this->input->post('address1',true);
		$Phone= $this->input->post('Phone',true);
		$website= $this->input->post('website',true);
		$description= $this->input->post('description',true);
		$city= $this->input->post('city',true);
		$state= $this->input->post('state',true);
		$zip= $this->input->post('zip',true);
		
               /*changing the time to 183 days */ 

  if (strlen($track)>6 && strlen($track)<=12) {
			
			$YearOn = date('2099-m-d');$YearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 92 day"));
			$maptag_type = 'Premium';
			$maptaduration = "3 months";
			$dynamictext = 'Inorder to extend the expiry simply refer your friends with any of your Share links, For every friend that sign ups using your link , you get an extra 1 Year on your premium Maptag refer <a style="color: blue;" href="http://mapta.gs/site/faq" > http://mapta.gs/site/faq </a> ';
			
  }
		else if(strlen($track)>1 && strlen($track)<=6) {
			
			$YearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 92 day"));
			$maptag_type = 'Special';
			$maptaduration = "3 months";
			$dynamictext = 'Inorder to extend the expiry simply refer your friends with any of your Share links, For every friend that sign ups using your link , you get an extra 1 Year on your premium Maptag refer <a style="color: blue;" href="http://mapta.gs/site/faq" > http://mapta.gs/site/faq </a> ';
		}
		else{
			
			$YearOn = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"));
			$maptag_type = 'Free';
			$maptaduration = "";
			$dynamictext = 'Inorder to extend the expiry simply refer your friends with any of your Share links, For every friend that sign ups using your link , you get an extra 1 Year on your premium Maptag refer <a style="color: blue;" href="http://mapta.gs/site/faq" > http://mapta.gs/site/faq </a> ';
			
		}

		$insert_data = array(
							'city' => $city,
							'name' => $track,
							'state' => $state,
							'adderss' => $address,
							'address1' => $address1,
							'phone' => $Phone,
							'description' => $description,
							'stats' => $maptag_type,
							'website' => $website,
							'zip'	=> $zip,
							'lat'    => $lat,
							'lng'    => $lng,
							'img1'    => $this->session->userdata('file1'),
							'img2'    => $this->session->userdata('file2'),
							'img3'    => $this->session->userdata('file3'),
							'img4'    => $this->session->userdata('file4'),
							'img5'    => $this->session->userdata('file5'),
							'added_date'=>date('Y-m-d'),
							'expire_in'=>$YearOn,
							'user_id' => $this->session->userdata('member_id')
						);
			$insert=true;
			$aValid = array('-', '_'); 
			if (!ctype_alnum(str_replace($aValid, '', $track))) {
				$insert=false;
				echo "{\"code\": 4}";
			}
			$check = $this->db->query("SELECT id FROM custom_track WHERE name='$track'");
						
			if($check->num_rows() > 0){
				echo "{\"code\": 3}";
				$insert=false;
			}
			$chk_count = $this->db->query("SELECT count(id) AS c FROM custom_track WHERE user_id=$uid");
			$count = $chk_count->row();
			if($count->c >= 200){
				echo "{\"code\": 2}";
				$insert=false;
			}
			if ($insert!=false) {
				$this->load->library('mandrill');
				$mandrill_ready = NULL;
			try {
			    $this->mandrill->init(MANDRILL_API_KEY);
			    $mandrill_ready = TRUE;
			
			} catch(Mandrill_Exception $e) {
			    $mandrill_ready = FALSE;
			}
			if( $mandrill_ready ) {
				$this->data['maptag_name'] = $track;
				$this->data['name'] = $this->session->userdata('fname');
				$this->data['email'] = $this->session->userdata('user');
				$this->data['expire'] = $YearOn;
				$this->data['maptagduration'] = $maptaduration;
				$this->data['dynamictext'] = $dynamictext;
				$this->data['maptag_type'] = $maptag_type;
				$content = $this->load->view('email-templates/maptag-message',$this->data,true);
				$subject = "Hi ".$this->session->userdata('fname').", Your Maptag [".$track."] is now active, Expiry details inside";
				//Send us some email!
			    $email = array(
			        'html' => $content, //Consider using a view file
			        'text' => "Your Maptag ".$track." is now active!",
			        'subject' => $subject,
			        'from_email' => 'contact@mapta.gs',
			        'from_name' => "Hi ".$this->session->userdata('fname'),
			        'to' => array(array('email' => $this->session->userdata('user') )) //Check documentation for more details on this one
			        //'to' => array(array('email' => 'joe@example.com' ),array('email' => 'joe2@example.com' )) //for multiple emails
			        );
			
			    $result = $this->mandrill->messages_send($email);	
			} 
				
/*				$this->email->set_mailtype("html");
				$subject = "Your Maptag ".$track." is now active!";
				$this->email->from("contact@mapta.gs", "Your Maptag ".$track." is now active!");
				$this->email->to( $this->session->userdata('user') );
				$this->email->subject($subject);

				$this->data['maptag_name'] = $track;
				$this->data['name'] = $fname;
				$content = $this->load->view('email-templates/maptag-message',$this->data,true);
				$this->email->message( $content );	
				$this->email->send();
*/
				$this->db->insert('custom_track', $insert_data);
				$res= $this->db->affected_rows();
				$insert_id = $this->db->insert_id();
				echo "{\"code\": $res,\"insert_id\": $insert_id}";
				//echo "{\"code\": $res}";
			}
			exit;
	}
	/* Add Maptag Images*/	
	public function add_track_image()
	{
		$error = false;
		if(isset($_FILES)){
			foreach ($_FILES as $files) {     
	   	       for($i=0;$i<count($_FILES["files"]["name"]);$i++){
	  				move_uploaded_file($files['tmp_name'][$i], './map_image/'.$files['name'][$i]);
	  				$file1 =  isset($files['name'][0])?$files['name'][0]:'';
	  				$file2 =  isset($files['name'][1])?$files['name'][1]:'';
	  				$file3 =  isset($files['name'][2])?$files['name'][2]:'';
	  				$file4 =  isset($files['name'][3])?$files['name'][3]:'';
	  				$file5 =  isset($files['name'][4])?$files['name'][4]:'';
	  				//$my_file = implode(',', $files_arr);
	  				$file_num = array
									(
										'file1'  => $file1,
										'file2'  => $file2,
										'file3'  => $file3,
										'file4'  => $file4,
										'file5'  => $file5,
									);
					$this->session->set_userdata( $file_num );
	        	}
	    	}
		}
		else{
			$error = true;
		}
		$data = ($error) ? array('error' => 'There was an error uploading your files') : array('upload' => 'All files uploaded');
		echo json_encode($data);
			
				
	}
	/* Show The maptag Which is just created*/
	public function show_last_maptag()
	{
		
        $insert_id = $this->input->post('insert_id');
           
        $query = $this->db->get_where('custom_track', array('id' => $insert_id) );
        
        foreach ($query->result_array() as $maptag_name) {

        	echo json_encode($maptag_name);
        	
        }
        		
		exit;
	}
	public function getLastLocation($uid) {
		$query = "SELECT lat, lng, last_date FROM user_location WHERE user_id=".$uid;
		$res = $this->db->query($query);
		$row = $res->row();
		echo json_encode($row);
	}
	/* check the maptag Status, i-e special,free,premium. Also check is maptag avialable or not*/
	public function check_track_code()
	{
		$term= html_escape($this->input->get_post('name',true));
		$customtrack = $this->db->query("SELECT name FROM custom_track WHERE name = '$term'");
		
		if($term=='') {
		}elseif($customtrack->num_rows()>0){
			echo "<b style='color:red'>".$term." Already taken</b>";
		}
		else{
			if(strlen($term)>=1 && strlen($term)<=6){
				echo "<b>".$term."</b> is a special Maptag";
			}
			else if(strlen($term)>6 && strlen($term)<=12){
				echo "<b>".$term."</b> is a premium Maptag";
			}
			else{
				echo "<b>".$term."</b> is a free Maptag";
			}
		}
	exit;
	}
}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */