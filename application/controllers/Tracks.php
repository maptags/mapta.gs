<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tracks extends CI_Controller {

    public function index($requestPage) {
        /* Get the searched maptag and get the results then store in cookies */
        $name = $this->uri->segment(1);
        $this->setTheCookie($name);
        $this->load->view($requestPage);
    }
    
     public function staticPages($page) {
        $name = $this->uri->segment(2);
        $this->setTheCookie($name);
        $this->load->view($page);
    }

    private function setTheCookie($name) {
        $track_reffererr = $this->db->query("select * from custom_track where name='$name'");
        /* If not maptag just redirect to home */
        if ($track_reffererr->num_rows() <= 0) {
            redirect('');
        } else {
            /* store maptag in cookie */
            $row = $track_reffererr->row();
            $tracker_cookie = array(
                'name' => 'tracker-name',
                'value' => $name,
                'expire' => '604800',
            );

            $this->input->set_cookie($tracker_cookie);
            /* store user id in cookie */
            $tracker_id_cookie = array(
                'name' => 'tracker-id',
                'value' => $row->user_id,
                'expire' => '604800',
            );

            $this->input->set_cookie($tracker_id_cookie);
            /* Store referre true in cookie */
            $tracker_reffer_cookie = array(
                'name' => 'tracker-refrrer',
                'value' => TRUE,
                'expire' => '604800',
            );

            $this->input->set_cookie($tracker_reffer_cookie);
            if ($this->session->userdata('logged_in') == true) {
                $data = array(
                    'flag' => 'Maptag',
                    'searchterm' => $name,
                    'ipaddress' => $this->input->ip_address(),
                    'timestamp' => date('Y-m-d H:i:s'),
                    'user_id' => $this->session->userdata('member_id')
                );
            } else {
                $data = array(
                    'flag' => 'Maptag',
                    'searchterm' => $name,
                    'ipaddress' => $this->input->ip_address(),
                    'timestamp' => date('Y-m-d H:i:s'),
                    'user_id' => 0
                );
            }
            $this->db->insert('search_teams', $data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */