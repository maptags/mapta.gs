<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actions extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		/*If direct access redirect to maptags*/
		$this->my_track_codes();
	}
	public function my_track_codes()
	{
		/*show all maptags for logged in user*/
		$member_id = $this->session->userdata('member_id');
		$track_codes = $this->db->query("select * from custom_track where user_id='$member_id'")->result();
		$data['track_codes'] = $track_codes;
		$this->load->view('members/track-codes',$data);

	}
	public function track_code_action()
	{
		/*All actions related to maptags i-e edit,delete,extend,refer*/
		$action=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$member_id = $this->session->userdata('member_id');
		/*Edit Maptag*/
		if($action=='edit'){

			$track_codes_edit = $this->db->query("select * from custom_track where id='$id' and user_id='$member_id'")->result();

			$data['track_codes_edit'] = $track_codes_edit;
			$this->load->view('members/track-codes-edit',$data);
		}
		/*Delete Maptag*/
		if($action=='delete'){
			$track_codes_edit = $this->db->query("delete from custom_track where id='$id' and user_id='$member_id'");
			$res= $this->db->affected_rows();
				if ($res == 0) {

					$this->session->set_flashdata('result', 'Record not Deleted');
					redirect('actions/my_track_codes');
				    return FALSE;
				}
				else{
					$this->session->set_flashdata('result', 'Record Deleted');
					redirect('actions/my_track_codes');
				    return TRUE;
				}
		}
		/*Refer Maptag*/
		if($action=='referrer'){
			$name=$this->uri->segment(4);

			$member_id = $this->session->userdata('member_id');
			$track_reffererr = $this->db->query("select * from custom_track where name='$name' and user_id='$member_id'");
			if($track_reffererr->num_rows()>0){
				$data['track_reffererrs'] = $track_reffererr->result();
				$this->load->view('members/track-refferrer',$data);
			}
			else{
				$this->load->view('members/track-refferrer');
			}


		}
		/*Extend Maptag*/
		if( $action == 'extend_date' ){
			$id=$this->uri->segment(4);
			$member_id = $this->session->userdata('member_id');
			$track_extends = $this->db->query("select * from custom_track where id='$id' and user_id='$member_id'")->result();
			$data['track_extends'] = $track_extends;
			$this->load->view('members/track-extend',$data);

		}

		if($action=='extend_done'){
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$year=$this->input->post('year');
			if (!is_numeric($year)) {
				$this->session->set_flashdata('result', 'Use a numric number for years');
				redirect('actions/my_track_codes');
			}
			$current_year = $this->input->post('expiry');
                         //changed number of days

			$extend = 365*$year;
			$newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($current_year)) . " + $extend day"));
			//$YearOn = date($current_year,strtotime(date($current_year, time()) . " + $extend day"));
			$member_id = $this->session->userdata('member_id');
			$user_credits = $this->db->query("select * from user_credits where user_id='$member_id'");
			$user_credit = $user_credits->row();
			$credit_earn 	 = 	$user_credit->credit_earn;
			if(strlen($name) >1 && strlen($name)<=6){

				$credit_use = $year/1;
			}
			else if(strlen($name) >6 && strlen($name)<=12){

				$credit_use = $year/2;
			}
			else{

				$credit_use = $year/2;
			}

			$credit_used  	 = 	$user_credit->credit_used+$credit_use;

			$credit_left  	 = 	$credit_earn-$credit_used;
			//$credit_remain  	 =  $credit_earn - $credit_left;

			if( $credit_left >= 1 ){
			$track_extends = $this->db->query("update custom_track set expire_in='$newEndingDate' where id='$id' and user_id='$member_id'");
			$this->db->query("update user_credits set credit_used = '$credit_used',credit_left = '$credit_left' where user_id='$member_id'");
			$this->session->set_flashdata('result', 'Maptag extendeds');
			redirect('actions/my_credits');
		}
		else{
			$this->session->set_flashdata('result', 'You have not enough credit...');
			redirect('actions/my_credits');
		}
			
		}
		if($action=='edit_done'){
			$id=$this->input->post('id',true);
			$city=$this->input->post('city',true);
			$state=$this->input->post('state',true);
			$website=$this->input->post('website',true);
			$address=$this->input->post('address',true);
			$address1=$this->input->post('address1',true);
			$zip=$this->input->post('zip',true);
			$phone=$this->input->post('phone',true);
			$description=$this->input->post('description',true);
			$lat=$this->input->post('lat',true);
			$lng=$this->input->post('lng',true);

			$update_data = array(
               'city' => $city,
               'state' => $state,
               'adderss' => $address,
               'address1' => $address1,
               'phone' => $phone,
               'description' => $description,
               'website' => $website,
               'lat' => $lat,
               'lng' => $lng,
            );
            $this->db->where('id', $id);
			$this->db->update('custom_track', $update_data);
			$res= $this->db->affected_rows();
				if ($res == 0) {
					
					$this->session->set_flashdata('result', 'Record not Updated');
					redirect('actions/my_track_codes');
				    return FALSE;
				}
				else{
					$this->session->set_flashdata('result', 'Record Updated');
					redirect('actions/my_track_codes');
				    return TRUE;
				} 
		}
		if($action == 'update_images'){
			$id=$this->uri->segment(4);
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
	  				if(isset($files['name'][0])){
	  					/*$query = $this->db->query("SELECT img1 FROM custom_track WHERE id='$id'");
		  			if ($query->num_rows() > 0) {
					   $row = $query->row(); 
					   unlink(PUBPATH.'map_image/'.$row->img1);
					}*/
	  					$this->db->query("UPDATE custom_track SET img1 = '$file1' WHERE id='$id'");
	  				}
	  				if(isset($files['name'][1])){
	  					/*$query = $this->db->query("SELECT img2 FROM custom_track WHERE id='$id'");
		  			if ($query->num_rows() > 0) {
					   $row = $query->row(); 
					   unlink(PUBPATH.'map_image/'.$row->img2);
					}*/
	  					$this->db->query("UPDATE custom_track SET img2 = '$file1' WHERE id='$id'");
	  				}
	  				if(isset($files['name'][2])){
	  					/*$query = $this->db->query("SELECT img3 FROM custom_track WHERE id='$id'");
		  			if ($query->num_rows() > 0) {
					   $row = $query->row(); 
					   unlink(PUBPATH.'map_image/'.$row->img3);
					}*/
	  					$this->db->query("UPDATE custom_track SET img3 = '$file1' WHERE id='$id'");
	  				}
	  				if(isset($files['name'][3])){
	  					/*$query = $this->db->query("SELECT img4 FROM custom_track WHERE id='$id'");
		  			if ($query->num_rows() > 0) {
					   $row = $query->row(); 
					   unlink(PUBPATH.'map_image/'.$row->img4);
					}*/
	  					$this->db->query("UPDATE custom_track SET img4 = '$file1' WHERE id='$id'");
	  				}
	  				if(isset($files['name'][4])){
	  					/*$query = $this->db->query("SELECT img5 FROM custom_track WHERE id='$id'");
		  			if ($query->num_rows() > 0) {
					   $row = $query->row(); 
					   unlink(PUBPATH.'map_image/'.$row->img5);
					}*/
	  					$this->db->query("UPDATE custom_track SET img5 = '$file1' WHERE id='$id'");
	  				}
	  				
	        	}
	        	$error = false;
	    	}
		}
		else{
			$error = true;
		}
		$data = ($error) ? array('error' => 'There was an error uploading your files') : array('upload' => $id);
		echo json_encode($data);
		}
	}
	/*SHow all Credits For logged in Users*/
	public function my_credits() {
		$member_id = $this->session->userdata('member_id');
		$track_codes = $this->db->query("select * from user_credits where user_id='$member_id'")->result();
		$data['my_credits'] = $track_codes;
		$track_codes = $this->db->query("select user_credits.*,credit_source.user_id,credit_source.current_id,credit_source.earn_date,credit_source.email as 'email',credit_source.fname as 'fname',credit_source.lastname as 'lname' from user_credits left join credit_source
										on user_credits.user_id=credit_source.user_id where user_credits.user_id='$member_id'")->result();
		$data['credits_helper'] = $track_codes;
		$friends_refferal = $this->db->query("SELECT * FROM users where refferby =$member_id");
		if($friends_refferal->num_rows()>0){
			$data['your_ref']= $friends_refferal->num_rows();	
			for ($i=0; $i < count($friends_refferal->num_rows()); $i++) { 

			foreach ($friends_refferal->result() as $friend_refferal) {
				$fid[] = $friend_refferal->id;
			}

		}
		$ids = implode(',', $fid);
		if($ids){
			$f_refferal = $this->db->query("SELECT sum(credit_earn) as total_cre FROM user_credits where user_id in ($ids)");
			//echo $this->db->last_query();
			$data['f_ref']= $f_refferal->result();
			foreach ($f_refferal->result() as $total_friend) {
	            $second = round( $total_friend->total_cre/5 );
	        }
		         $total =$friends_refferal->num_rows() +  $second; 
		         $data['count_total']=$total;
	     	}
	     	else{
	     		$data['count_total']=0;
	     		$data['f_ref']= 0;
	     	}
	     	}
			else{
				$data['count_total']=0;
				$data['your_ref']= 0;	
			}
		$this->load->view('members/my-credits',$data);
	}
	/*The people who help you to give credits*/
	public function credit_helper()
	{
		$id=$this->uri->segment(3);
		$track_codes = $this->db->query("select user_credits.*,credit_source.user_id,credit_source.current_id,credit_source.earn_date,credit_source.email as 'email',credit_source.fname as 'fname',credit_source.lastname as 'lname' from user_credits left join credit_source
										on user_credits.user_id=credit_source.user_id where user_credits.user_id='$id'")->result();
		$data['credits_helper'] = $track_codes;
		$friends_refferal = $this->db->query("SELECT * FROM users where refferby =$id");
		$data['your_ref']= $friends_refferal->num_rows();	
		
		for ($i=0; $i < count($friends_refferal->num_rows()); $i++) { 

			foreach ($friends_refferal->result() as $friend_refferal) {
				$fid[] = $friend_refferal->id;
			}

		}
		$ids = implode(',', $fid);
		$f_refferal = $this->db->query("SELECT sum(credit_earn) as total_cre FROM user_credits where user_id in ($ids)");
		//echo $this->db->last_query();
		$data['f_ref']= $f_refferal->result();
		foreach ($f_refferal->result() as $total_friend) {
            $second = round( $total_friend->total_cre/5 );
         }
         $total =$friends_refferal->num_rows() +  $second; 
         $data['count_total']=$total;
		$this->load->view('members/credits-helper',$data);
	}
	/*Save other user maptag for later use*/
	public function save_maptag()
	{
		$maptag = $this->input->post('name',true);
		$member_id = $this->session->userdata('member_id');
		$query = $this->db->get_where('saved_maptags', array('user_id' => $member_id,'maptag_id' => $maptag) );
		if($query->num_rows()==0){
			$insert_arr  = array(
									'user_id' => $member_id, 
									'maptag_id' => $maptag, 
								);
			$this->db->insert('saved_maptags',$insert_arr);
			echo 'Maptag has been saved....';
		}
		else{
			echo 'Maptag already in your list';
		}

	}
	public function isMapTagSaved() {
		$maptag = $this->input->post('name',true);
		$member_id = $this->session->userdata('member_id');
		$query = $this->db->get_where('saved_maptags', array('user_id' => $member_id,'maptag_id' => $maptag) );
		$res = $query->result();
		if(empty($res)) {
			echo "0";
		}
		else {
			echo "1";
		}
		exit;
	}
	/*Show all saved Maptags for current User*/
	public function saved_maptags()
	{
		$member_id = $this->session->userdata('member_id');
		
		$track_codes = $this->db->query("select saved_maptags.*,custom_track.user_id,custom_track.name,custom_track.added_date,custom_track.expire_in,custom_track.id as 'map_id' from saved_maptags left join custom_track
										on saved_maptags.maptag_id=custom_track.name where saved_maptags.user_id='$member_id'");
		
		if($track_codes->num_rows()>0){
				$data['track_codes'] = $track_codes->result();
				$this->load->view('members/saved-maptag',$data);
			}
			else{
				$this->load->view('members/saved-maptag');
			}
	}
	public function transfer()
	{
		$email=$this->input->post('email');
		$tagid=$this->input->post('param');
		$sessionId=$this->session->userdata('user');
		$data=array();
		if($email!=''){
			
			$result = $this->db->query("SELECT id FROM users where email='$email'");
			//print_r($result);
			$num_rows= $result->num_rows();
			$userid=0;
			if($num_rows>0)
			{
				foreach ($result->result() as $row)
				{
					array_push($data, $row->id);
					$userid=$row->id;
				}
				$update = $this->db->query("update custom_track set user_id = '$userid'  where id = '$tagid'");
				$tagnameresult=$this->db->query("SELECT name,expire_in FROM custom_track where id = '$tagid'");
				$tagname='';
				$expiry='';
				foreach ($tagnameresult->result() as $row)
				{
					$tagname=$row->name;
					$expiry=$row->expire_in;
				}
					$insert_arr  = array(
											'maptag_name' => $tagname,
											'from_id' => $this->session->userdata('member_id'),
											'to_id' => $userid
										);
					$this->db->insert('maptagtransfer',$insert_arr);
						
					$fnameresult=$this->db->query("SELECT fname FROM users where email = '$email'");
					$fname='';
					foreach ($fnameresult->result() as $row)
					{
						$fname=$row->fname;
					}
					$user_email = $email;
					$user_fname = $fname;
						$this->load->model('mandrillapi','mandrillService');
						
						$this->mandrillService->sendEmail($user_email,array('name' => $user_fname,
								'email' => $user_email,
								'maptag_name'=>$tagname,
								'transfer_from'=>ucfirst($this->session->userdata('fname')),
								'expire'=>$expiry
								
						),'maptag-transfer',ucfirst($this->session->userdata('fname')).' sent you a Maptag ');
						
			}
			echo json_encode($data);
			exit;
		} 
	}
	public function toggle()
	{
		$tagname=$this->input->post('param');
		$state=$this->input->post('state');
		$data=array();
		$update = $this->db->query("update custom_track set status = '$state'  where name = '$tagname'");
		array_push($data, $this->db->affected_rows($update));
		echo json_encode($data);
		exit;
	}
}

/* End of file Actions.php */
/* Location: ./application/controllers/Actions.php */