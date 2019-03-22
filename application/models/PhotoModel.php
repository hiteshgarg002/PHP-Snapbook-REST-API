<?php 
class PhotoModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function uploadDP($dpname,$dp){
		move_uploaded_file($dp,"images/profile/$dpname");
	}
	
	function uploadPhoto($photoName,$photo){
		move_uploaded_file($photo,"images/post/$photoName");
	}

	function uploadProductPhoto($photoName,$photo){
		move_uploaded_file($photo,"images/product/$photoName");
	}
	
	function uploadPhotoDetails($values){
		$result=$this->db->insert("post",$values);
		return $result;
	}
}
?>