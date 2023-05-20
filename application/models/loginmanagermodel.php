<?php
class LoginManagerModel extends CI_Model
  {

  	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    function validateUser()
    {  
        $userName = $this -> commonlib -> cleanData($this -> input -> post('u_name'));
			$userPassword = $this -> commonlib -> cleanData($this -> input -> post('u_password'));

			$query="select userId, userName from users where userName = '" . trim($userName) . "' AND userPassword= '" . trim(MD5($userPassword)) . "' and active=1";
        $execQuery=$this->db->query($query);
        $data = array();

			if($execQuery !== FALSE && $execQuery->num_rows() > 0){
			    foreach ($execQuery->result_array() as $row) {
			        $data[] = $row;
			    }
			}

        return $data;
    }

    function saveLoginAccess($userId,$deviceInfo=""){

      $deviceInfo = $this -> commonlib -> cleanData($deviceInfo);
      $dateTime=date("Y-m-d H:i:s");
      $query="INSERT into user_login_track(
                `userId`,
                `accessDateTime`,
                `deviceInfo`) values ($userId,'$dateTime','$deviceInfo')";
      $execQuery=$this->db->query($query);
      return ;

    }

  }
?>