<?php 
 	
 	function print_header( $param = false ) {
 		$CI =& get_instance();
		if( $param == false ){
			$CI->load->view('include/header');
		}
		else{

			$CI->load->view('include/header-'.$param);
		}
	}
	function print_footer( $param = false ) {
 		$CI =& get_instance();
		if( $param == false ){
			$CI->load->view('include/footer');
		}
		else{

			$CI->load->view('include/footer-'.$param);
		}
	}
	function print_sidebar( $param = false ) {
 		$CI =& get_instance();
		if( $param == false ){
			$CI->load->view('include/sidebar');
		}
		else{

			$CI->load->view('include/sidebar-'.$param);
		}
	}
	function get_random_maptag(){
		$CI =& get_instance();
		$member_id = $CI->session->userdata('member_id');
		$track_codes = $CI->db->query("SELECT * from custom_track where user_id='$member_id' LIMIT 1");
		return $track_codes;
		
	}
	
?>