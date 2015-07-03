<?php
class Contacts extends CI_Model {
	private $contacts = array();
	function __construct()
    {
    	$this->load->model('Contact');
        parent::__construct();
    }
    function add($hostEmail,$name,$email,$image_url) {
    	$this->load->model('Contact');
    	$this->contacts []= new Contact($hostEmail,$name,$email,$image_url);
    }
    function processData() {
    	$emailarray = array();
		$login_query = $this->db->query("select email from `users` where status=1 ");
    	foreach($login_query->result() as $email) $emailarray[] = $email->email;

    	foreach($this->contacts as $contact) {
			if(in_array($contact->email,$emailarray)) $contact->setregisteredUser(true); else   $contact->setregisteredUser(false);  					
    	}
    	$this->addcontactstotable();    	
    }
    function getContacts() {
    	return $this->contacts;
    }
    function addcontactstotable() {
    	foreach ($this->contacts as $contact) {
    		$contact->addToDb();
    	}
    }
    function loadContact($email) {
    	$query= $this->db->query("select * from `googlecontacts` where useremail='$email'");	
			foreach ($query->result() as $qry) {
    			$this->contacts []= new Contact($qry->useremail,$qry->name,$qry->email,$qry->image,$qry->registered_user,$qry->invited);	
			}
    	}
    function updateInvite($useremail,$email) {    	
    	try {
    		$rs= $this->db->query("select * from `googlecontacts` where email='$email' and useremail='$useremail'")->result();	
 	   		$id = $rs[0]->id;
			$this->db->where('id', $id);
			$data = array(
				'invited'=>true
			);
			$this->db->update('googlecontacts', $data); 
		return true;
    	} catch(Exception $e) {
    		return false;
    	}
    }
}