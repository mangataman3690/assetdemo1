<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmanager extends CI_Controller {

	function __construct()
     {
        parent::__construct();
        
        $this -> load -> helper("url");
        $this -> load -> library("commonlib");
        $this->load->model("loginmanagermodel");
        
     }

	public function index()
	{
		$this->load->view('loginmanagerview');
	}

	function checklogin(){
		unset($_SESSION['userId']);

		$data=array();

		$username = $this -> commonlib -> cleanData($this -> input -> post('u_name'));
		$password = $this -> commonlib -> cleanData($this -> input -> post('u_password'));
		
		if (trim($username) == "") {
			$data['status']  = "Error";
			$data['errorMsg']  = "Please enter a valid username";

		}
		if (trim($password) == "") {
			$data['status']  = "Error";
			$data['errorMsg']  ="Please enter a valid password";

		}
		if(isset($data['status'])){
			echo json_encode($data);

		}
		$resultSet=$this->loginmanagermodel->validateUser();
		if(is_array($resultSet) && isset($resultSet[0])){
			$_SESSION['userId']=$resultSet[0]['userId'];
			$_SESSION['userName']=$resultSet[0]['userName'];
		 	$data['status'] = "Success";
			$data['successMsg']  ="";
			$this->loginmanagermodel->saveLoginAccess($resultSet[0]['userId']);

		} else {
			$data['status']  = "Error";
			$data['errorMsg']  ="Invalid Username/Password combination or Account Inactive";

		}
		echo json_encode($data);

	}

	function logout(){
		session_destroy();
	}

}
