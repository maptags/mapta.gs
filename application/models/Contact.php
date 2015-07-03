<?php
class Contact extends CI_Model {
	public $name;
	public $email;
	public $image;
	public $registered_user;
	public $invited;
	public $useremail;	
	private $table = 'googlecontacts';
	function __construct($hostEmail,$name,$email,$image_url,$registered_user=0,$invited=0) {
		parent::__construct();
		$this->name = $name;
		$this->email = $email;
		$this->image = $image_url;
		$this->useremail = $hostEmail;
		$this->invited = $invited;
		$this->registered_user = $registered_user;
	}
    
    function setregisteredUser($val) {
    	$this->registered_user = $val;
    }
    function setImage($var) {
    	$this->imageExist = $var;
    }
    function addToDb() {
    	if($this->validate()) {
    		$this->db->insert($this->table,$this);
    	}
    }
    function validate() {
    	$flag = true;
    	if(!isset($this->name)) $flag = false;
    	if(!isset($this->invited)) $flag = false;
		if(!isset($this->email)) $flag = false;
    	if(!isset($this->image)) $flag = false;
    	if(!isset($this->registered_user)) $flag = false;
    	if(!isset($this->useremail)) $flag = false;
    	$query= $this->db->query("select * from `googlecontacts` where email='$this->email' and useremail='$this->useremail'");	
    	if ($query->num_rows() > 0) $flag = false;
	    	return $flag;
    }
}