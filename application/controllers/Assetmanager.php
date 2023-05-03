<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assetmanager extends CI_Controller {

	function __construct()
     {
        parent::__construct();
        
        $this -> load -> helper("url");
        $this -> load -> library("commonlib");
        $this->load->model("assetmanagermodel");
        
     }

	function display_grid(){
		
		$resultSet=$this->assetmanagermodel->displayGrid(" assetName ASC ", 10);
		$this->load->view('assetmanagerview',$resultSet);

	}

	function display_more(){
		
		$sort_by = $this -> commonlib -> cleanData($this -> input -> post('sort_by'));
		$pageLimit = $this -> commonlib -> cleanData($this -> input -> post('pageLimit'));
		$offset = ($pageLimit * 10);

		$resultSet=$this->assetmanagermodel->displayGrid($sort_by, 10 , $offset);
		return $resultSet;

	}

	//  use same function to view asset details as well as auto fill asset details incase of edit functionlaity

	function view_asset(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('assetId'));
		$resultSet=$this->assetmanagermodel->view($assetId);
		return $resultSet;

	}

	function add_asset(){

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
			$var .= "a_installationyear-Installation Year cannot be left blank.";
			$flag++;
		} else {

			$installationYear = (int)$installationYear;
    		if($installationYear>1900 && $input<2100) {
      		//valid
    		} else {
    			$var .= "a_installationyear-Installation Year should be between year 1900 and 2100.";
				$flag++;
    		}

		}

		if($flag==0 & $var==""){

			$resultSet=$this->assetmanagermodel->add();

			if($resultSet==1 || $resultSet>1){

				return "success|";

			} else {
				return "error|".$resultSet;
			}

		} else {
			return "error|".$flag."|".$var;
		}

	}

	function edit_asset(){

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
			$var .= "a_name-Asset Name cannot be left blank.";
			$flag++;
		}
		if (trim($installationYear) === '' && strlen(trim($installationYear)) == 0) {
			$var .= "a_installationyear-Installation Year cannot be left blank.";
			$flag++;
		} else {

			$installationYear = (int)$installationYear;
    		if($installationYear>1900 && $input<2100) {
      		//valid
    		} else {
    			$var .= "a_installationyear-Installation Year should be between year 1900 and 2100.";
				$flag++;
    		}

		}

		if($flag==0 & $var==""){

			$resultSet=$this->assetmanagermodel->edit($assetId);

			if($resultSet==1){

				return "success|";

			} else {
				return "error|".$resultSet;
			}

		} else {
			return "error|".$flag."|".$var;
		}
		
	}

	function delete_asset(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('d_assetId'));

		// check if delete permission protocal is there , allow delete based on that , otherwise allow delete to all by default

		$resultSet=$this->assetmanagermodel->delete_asset($assetId);

		if($resultSet==1){

			return "success|";

		} else {
			return "error|".$resultSet;
		}
		
	}


}
