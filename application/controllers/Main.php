<?php

class Main extends CI_Controller {

	function __construct()
     {
        parent::__construct();
        
        $this -> load -> helper("url");
        $this -> load -> library("commonlib");
        $this -> commonlib -> checkLoggedIn();
        
     }

	function index(){

		$loggedBit = $this -> commonlib -> checkLoggedIn();
		$expired = 0;

		//  use session and cookies to check status : 
		//  case 1 : first time - yet to login
		//  case 2 : already logged - in session
		//  case 3 : session expired

		if($loggedBit == 1) {

			if($expired == 1){

				header("location:".base_url()."loginmanager/logout");
				exit;

			} 

			  header("location:".base_url()."assetmanager/display_grid");

		} else {
			
			header("location:".base_url()."loginmanager");
		}

	}


}
