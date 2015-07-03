<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index()
	{
		
		$this->load->helper('url');
		$message = '';
		$data 	 = $this->input->get(NULL, TRUE);
		$link 	 = current_url();
		if(!isset($data['token'])){
			$message = "Token not provided";
			$this->log('NoToken',$message,$link);
			return;
		}
		else{
			$token = $data['token'];
		}
		if(!isset($data['key'])){
			$message = "Key not provided";
			$this->log('NoKey',$message,$link);
			return;
		}
		else{
			$key = $data['key'];
		}
		if($this->checkKey($key)){ 
			$nowUtc = new DateTime('now',new DateTimeZone('UTC'));
			if(isset($_SESSION[$key])){
				if($nowUtc->format('Y-m-d H:i:s') == $_SESSION[$key]['date']){
					$_SESSION[$key]['count'] = $_SESSION[$key]['count'] + 1;
				}
				else{
					$_SESSION[$key]['count'] = 1;
					$_SESSION[$key]['date']  = $nowUtc->format('Y-m-d H:i:s');
				}
			}
			else{
				$_SESSION[$key]['date'] = $nowUtc->format('Y-m-d H:i:s');
				$_SESSION[$key]['count'] = 1;
			}
			if($_SESSION[$key]['count']>10){
				$message = "Overflow : only 10 queries per second !";
				$this->log('Overflow',$message,$link);
				return;
			}
			if($this->checkToken($token,$key)){
				if(!isset($data['username'])){
					$message = "Username was not provided";
					$this->log('NoToken',$message,$link);
					return;
					
				}
				if(!isset($data['password'])){
					$message = "Password was not provided";
					$this->log($data['username'],$message,$link);
					return;
				}
				if(!isset($data['search'])){
					$message = "key was not provided";
					$this->log($data['username'],$message,$link);
					return;
				}
				$logindb 	 = $this->load->database('login',TRUE);
				$check_login = $logindb->query("SELECT * FROM login WHERE username='".$data['username']."' AND password='".$data['password']."'");
				if($check_login->num_rows() == 0){
					$message = "Username or password are not correct";
					$this->log($data['username'],$message,$link);
					return;
				}
				$db  	  = $this->load->database('default',TRUE);
				$res 	  = $db->query("SELECT name,lat,lng,adderss,address1,city,state,zip,phone FROM custom_track WHERE name='".$data['search']."'");
				if($res->num_rows() == 0){
					$message = "No records was found";
					$this->log($data['username'],$message,$link);
					return;
				}
				$response = $res->result();
				echo json_encode($response[0]);
				$this->log($data['username'],$message,$link);
				return;
			}
			else{
				$message = "Token invalid";
				$this->log('NoUsername',$message,$link);
				return;
			}
		}
		else{
			$message = "Key invalid";
			$this->log('KeyInvalid',$message,$link);
			return;
		}
		
	}
	
	protected function log($username,$message,$link){
	
		$apidb = $this->load->database('api',TRUE);
		$timestamp = date('Y-m-d H:i:s');
		if($message == ""){
			$status = 0;
		}
		else{
			$status = 1;
			$data['Error'] = $message;
			echo json_encode($data);
		}
		$apidb->query("INSERT INTO logs(username,timestamp,query,status,error) VALUES('".$username."','".$timestamp."','".$query."','".$status."','".$message."')");
		
	}
	
	protected function checkToken($token,$key){
		$t0 	= new DateTime('now', new DateTimeZone('UTC'));
		$token2 = sha1('oyster'.$t0->format( 'n/j/Y G').'solar'.$key);
		$token2 = base64_encode($token2);
		if($token == $token2){
			return true;
		}
		return false;
	}
	
	protected function checkKey($key){
		$result = $this->db->query("SELECT * FROM `users` WHERE MD5(CONCAT(email,password)) ='".$key."'");
		if($result->num_rows()>0){
			return true;
		}
		return false;
	}
}
