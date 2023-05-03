<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmanager extends CI_Controller {

	function __construct()
     {
        parent::__construct();
        
        $this -> load -> helper("url");
        $this->load->model("loginmanagermodel");
        
     }

	public function index()
	{

		$this->load->view('loginmanagerview');
	}

	function checklogin(){
		// print_r($_POST);

		$data="";

		$username = mysql_real_escape_string($this -> input -> post('u_name'));
		$password = mysql_real_escape_string($this -> input -> post('u_password'));
		
		if (trim($username) == "") {
			$data = "Error|Please enter a valid username";

		}
		if (trim($password) == "") {
			$data = "Error|Please enter a valid password";

		}
		if($data!=""){
			return $data;

		}
		$resultSet=$this->loginmanagermodel->validateUser();
		if(is_array($resultSet) && isset($resultSet[0])){
			$data = "Success|";
			$this->loginmanagermodel->saveLoginAccess($resultSet[0]['userId']);

		} else {
			$data = "Error|Invalid Username/Password combination or Account Inactive";

		}
		return $data;

	}
}
