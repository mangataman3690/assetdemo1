<?php
class LoginManagerModel extends CI_Model
  {

  	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    function validateUser()
    {  
        $userName = mysql_real_escape_string($this -> input -> post('u_name'));
			$userPassword = mysql_real_escape_string($this -> input -> post('u_password'));

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

      $deviceInfo = mysql_real_escape_string($deviceInfo);
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