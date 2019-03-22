<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PhotoController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model("PhotoModel");
	}
	
	function uploadDP(){
		$dpname=$_FILES['image']['name'];
		$dp=$_FILES['image']["tmp_name"];
		$this->PhotoModel->uploadDP($dpname,$dp);
	}
	
	function uploadPhoto(){
		$photoName=$_FILES['image']['name'];
		$photo=$_FILES['image']["tmp_name"];
		$this->PhotoModel->uploadPhoto($photoName,$photo);
	}

	function uploadProductPhoto(){
		$photoName=$_FILES['image']['name'];
		$photo=$_FILES['image']["tmp_name"];
		$this->PhotoModel->uploadProductPhoto($photoName,$photo);
	}
	
	function uploadPhotoDetails(){
		//$values['photoid']=$_GET['photoid'];
		$values['username']=$_GET['username'];
		$values['caption']=$_GET['caption'];
		$values['timestamp']=$_GET['timestamp'];
		$values['photo']=$_GET['photo'];
		$values['type']=$_GET['type'];
		$values['date']=$_GET['date'];
		
		$result=$this->PhotoModel->uploadPhotoDetails($values);
		
		if($result){
			echo "success";
		}else{
			echo "failed";
		}
	}
}
