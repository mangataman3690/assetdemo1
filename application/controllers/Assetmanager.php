<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetmanager extends CI_Controller {

	function __construct()
     {
        parent::__construct();
        
        $this -> load -> helper("url");
        $this -> load -> library("commonlib");
        $this->load->model("assetmanagermodel");

        $loggedBit=$this -> commonlib -> checkLoggedIn();
        if($loggedBit==0){
	        header("location:".base_url()."loginmanager");
	        exit;
	      }
        
     }

	function display_grid(){
		
		$resultSet=$this->assetmanagermodel->displayGrid(" assetName ASC ", 10);
		$header = array(
					"assetName" => "Name",
					"description" => "Description",
					"installationYear" => "Year Constructed",
					"expectedUsefulLife" => "Life",
					"renewalYear" => "Renewal Year",
					"assetCondition" => "Condition",
					"quantity" => "Quantity",
					"unitCost" => "Unit Cost",
					"estimatedCost" => "Estimated Cost",
					"action" => "Action"
						);
		$html= $this -> commonlib -> tablegrid($header,$resultSet);
		

		if(empty($_POST)){
			   
			   $data['html'] = $html;
				$this->load->view('assetmanagerview',$data);
		} else {
			echo  $html;
		}
			return;

	}

	function display_more(){
		
		$pageLimit = $this -> commonlib -> cleanData($this -> input -> post('pageNo'));
		$offset = ($pageLimit * 10);

		$resultSet=$this->assetmanagermodel->displayGrid(" assetName ASC ", 10 , $offset);
		
		$html= $this -> commonlib -> tablegrid(array(),$resultSet);
		
		echo  $html;

	}

	//  use same function to view asset details as well as auto fill asset details incase of edit functionlaity

	function view_asset(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('assetId'));
		$resultSet=$this->assetmanagermodel->view($assetId);
		echo json_encode($resultSet);

	}

	function add_asset(){

		$data=array();
		$var = "";
		$flag = 0;

		// validation :
		// assetname and expectedUsefulLife considered as mandatory
		// installationYear should be 4 digits ranging 1900 - 2100
		// can add validation if required


		$assetName = $this -> commonlib -> cleanData($this -> input -> post('a_name'));
		$description = $this -> commonlib -> cleanData($this -> input -> post('a_description'));
		$installationYear = $this -> commonlib -> cleanData($this -> input -> post('a_installationyear'));
		$expectedUsefulLife = $this -> commonlib -> cleanData($this -> input -> post('a_expectedusefullife'));
		$renewalYear = $this -> commonlib -> cleanData($this -> input -> post('a_renewalyear'));
		$condition = $this -> commonlib -> cleanData($this -> input -> post('a_condition'));
		$quantity = $this -> commonlib -> cleanData($this -> input -> post('a_quantity'));
		$unitCost = $this -> commonlib -> cleanData($this -> input -> post('a_unitcost'));
		$estimatedCost = $this -> commonlib -> cleanData($this -> input -> post('a_estimatedcost'));

		if (trim($assetName) === '' && strlen(trim($assetName)) == 0) {
			$var .= "a_name-Asset Name cannot be left blank.";
			$flag++;
		}
		if (trim($installationYear) === '' && strlen(trim($installationYear)) == 0) {
			$var .= "a_installationyear-Year Constructed cannot be left blank.";
			$flag++;
		} else {

			$installationYear = (int)$installationYear;
    		if($installationYear>1900 && $installationYear<2100) {
      		//valid
    		} else {
    			$var .= "a_installationyear-Year Constructed should be between year 1900 and 2100.";
				$flag++;
    		}

		}

		if($flag==0 & $var==""){

			$resultSet=$this->assetmanagermodel->add();

			if($resultSet==1 || $resultSet>1){

				$data['status']  = "Success";
				$data['successMsg']  ="Added Successfully.";

			} else {

				$data['status']  = "Error";
				$data['errorMsg']  =$resultSet;
			}

		} else {
			$data['status']  = "Error";
			$data['errorMsg']  =$var;
		}
		echo json_encode($data);

	}

	function edit_asset(){

		$data=array();
		$var = "";
		$flag = 0;

		// validation :
		// assetname and expectedUsefulLife considered as mandatory
		// installationYear should be 4 digits ranging 1900 - 2100
		// can add validation if required


		$assetId = $this -> commonlib -> cleanData($this -> input -> post('e_assetId'));
		$assetName = $this -> commonlib -> cleanData($this -> input -> post('e_name'));
		$description = $this -> commonlib -> cleanData($this -> input -> post('e_description'));
		$installationYear = $this -> commonlib -> cleanData($this -> input -> post('e_installationyear'));
		$expectedUsefulLife = $this -> commonlib -> cleanData($this -> input -> post('e_expectedusefullife'));
		$renewalYear = $this -> commonlib -> cleanData($this -> input -> post('e_renewalyear'));
		$condition = $this -> commonlib -> cleanData($this -> input -> post('e_condition'));
		$quantity = $this -> commonlib -> cleanData($this -> input -> post('e_quantity'));
		$unitCost = $this -> commonlib -> cleanData($this -> input -> post('e_unitcost'));
		$estimatedCost = $this -> commonlib -> cleanData($this -> input -> post('e_estimatedcost'));

		if (trim($assetName) === '' && strlen(trim($assetName)) == 0) {
			$var .= "e_name-Asset Name cannot be left blank.";
			$flag++;
		}
		if (trim($installationYear) === '' && strlen(trim($installationYear)) == 0) {
			$var .= "e_installationyear-Year Constructed cannot be left blank.";
			$flag++;
		} else {

			$installationYear = (int)$installationYear;
    		if($installationYear>1900 && $installationYear<2100) {
      		//valid
    		} else {
    			$var .= "e_installationyear-Year Constructed should be between year 1900 and 2100.";
				$flag++;
    		}

		}

		if($flag==0 & $var==""){

			$resultSet=$this->assetmanagermodel->edit($assetId);

			if($resultSet==1){

				$data['status']  = "Success";
				$data['successMsg']  ="Edited Successfully.";

			} else {
				$data['status']  = "Error";
				$data['errorMsg']  =$resultSet;
			}

		} else {
			$data['status']  = "Error";
			$data['errorMsg']  =$var;
		}
		echo json_encode($data);
		
	}

	function delete_asset(){

		$data=array();
		$assetId = $this -> commonlib -> cleanData($this -> input -> post('d_assetId'));

		// check if delete permission protocal is there , allow delete based on that , otherwise allow delete to all by default

		$resultSet=$this->assetmanagermodel->delete_asset($assetId);

		if($resultSet==1){

			$data['status']  = "Success";
			$data['successMsg']  ="Deleted Successfully.";

		} else {
			$data['status']  = "Error";
			$data['errorMsg']  =$resultSet;
		}
		echo json_encode($data);
		
	}

	function fetchuser(){
		$resultSet=$this->assetmanagermodel->fetchuser();
		$data = $resultSet->result_array();

		$mapResult=$this->assetmanagermodel->fetchselecteduser();
		$selectedValues=0;
		if(count($mapResult)>0){
			$selectedValues=$mapResult[0]['userId'];
		}

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('assetId'));
		$assetResult=$this->assetmanagermodel->view($assetId);

		if($data)
		{
			$array = $data[0];
			$keyArray = array_keys($array);
		}

		$i =0;
		$selectedValues = explode(',',$selectedValues);

		$count = count($selectedValues);
		$var="<option value=''>--Select--</option>";
		foreach ($resultSet->result_array() as $row)
		{
			if(in_array($row[$keyArray[0]], $selectedValues))
			{
				$var.="<option value='".$row[$keyArray[0]]."' selected='true'>".$row[$keyArray[1]]."</option>";
				if($i < ($count-1))
				{
					$i++;
				}
			}
			else
			{
				$var.="<option value='".$row[$keyArray[0]]."'>".$row[$keyArray[1]]."</option>";
			}

		}
		$resultData['str']=$var;
		$resultData['assetName']=$assetResult[0]['assetName'];
		echo json_encode($resultData);
	}

	function mapuser(){
		$resultSet=$this->assetmanagermodel->mapuser();
	}

	function showhistory(){
		$resultData=$this->assetmanagermodel->showhistory();
		echo json_encode($resultData);
	}



}
