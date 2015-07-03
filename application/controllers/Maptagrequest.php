<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maptagrequest extends CI_Controller {
	public function searchtag()
	{
		if($_GET['type'] == 'searchtag'){
	
			$result = $this->db->query("SELECT name FROM custom_track where status='1' AND name LIKE '".strtoupper($_GET['name_startsWith'])."%' order by name");
			$data = array();
			foreach ($result->result() as $row)
			{
				array_push($data, $row->name);
			}
			echo json_encode($data);
			exit;
		}
	
	}
	public function interested()
	{
		$data=array();
		if(!array_key_exists('user',$this->session->userdata())) {
			array_push($data, "false");
			echo json_encode($data);
			exit;
		}
		$tagname=$this->input->post('tagname');
		$sessionId=$this->session->userdata('user');
		$result = $this->db->query("SELECT B.email FROM custom_track AS A,users AS B where A.status='1' AND A.name='".$tagname."' AND A.user_id=B.id");
		$num_rows= $result->num_rows();
		$owneremail='';
		if($num_rows>0)
		{
			foreach ($result->result() as $row)
			{
				$owneremail=$row->email;
				array_push($data, $row->email);
			}
			$insert_arr  = array(
					'maptagname' => $tagname,
					'requestfrom' => $this->session->userdata('member_id'),
			);
			$this->db->insert('maptagrequests',$insert_arr);
			$this->load->model('mandrillapi','mandrillService');
				
			$this->mandrillService->sendEmail($owneremail,array('name' => ucfirst($this->session->userdata('fname')),
					'maptag_name'=>$tagname,
					'email' => $this->session->userdata('user'),
			),'maptag-interested',ucfirst($this->session->userdata('fname')).' is interested in '.$tagname);
	
		}
		echo json_encode($data);
		exit;
	}
	
}