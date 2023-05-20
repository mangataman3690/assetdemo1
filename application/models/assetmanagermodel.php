<?php
class Assetmanagermodel extends CI_Model
  {

  	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    function displayGrid($sort_by, $limit, $offset = 0) {

    	// view , edit , delete asset may also depend on permissions


    	$viewStr = "concat('<a onclick=viewRecord(',assetId,'); href=\"#\">View</a>')";
    	$editStr = "concat('<a onclick=editRecord(',assetId,'); href=\"#\">Edit</a>')";
    	$deleteStr = "concat('<a onclick=deleteRecord(',assetId,'); href=\"#\">Delete</a>')";
    	$mapStr = "concat('<a onclick=mapRecord(',assetId,'); href=\"#\">Map User</a>')";

    		
    		$actionStr = " concat( $viewStr,' ', $editStr,' ', $deleteStr,' ', $mapStr,' ') as action ";

        
        $searchQuery=$this->getSearchTermsQuery();
        $query="
            SELECT 	`assetId` ,
									  `assetName` ,
									  `description` ,
									  `installationYear` ,
									  `expectedUsefulLife` ,
									  `renewalYear` ,
									  `assetCondition` ,
									  `quantity` ,
									  `unitCost` ,
  									`estimatedCost`,

  									$actionStr
            FROM assets
       
            WHERE 1
            $searchQuery

            ORDER BY $sort_by LIMIT $offset,$limit
        ";
        
        $execQuery=$this->db->query($query)->result_array();
        return $execQuery;
    }

    function getSearchTermsQuery(){  
    		$searchString = 0;
        if($this->input->post('searchbox') !="")
        {
          $searchString = $this -> commonlib -> cleanData($this->input->post('searchbox')) ;

        }
        
        if(strlen($searchString)>0 && $searchString!="0")
        {
            
            $queryString="";
            $terms=explode(' ',$searchString);
            $queryString='%';
            foreach($terms as $term){
                $queryString.=$this->db->escape_like_str($term)."%";
            }

            return 'AND assetName LIKE "'.$queryString.'"';
        
        } else{
            return "";
            
        }
    }

    function view($assetId){

    	$query="
            SELECT 	`assetId` ,
									  `assetName` ,
									  `description` ,
									  `installationYear` ,
									  `expectedUsefulLife` ,
									  `renewalYear` ,
									  `assetCondition` ,
									  `quantity` ,
									  `unitCost` ,
  									`estimatedCost`
            FROM assets
       
            WHERE 
            assetId = ".$assetId."
        ";
        
        $execQuery=$this->db->query($query);
        $data = array();

				if($execQuery !== FALSE && $execQuery->num_rows() > 0){
				    foreach ($execQuery->result_array() as $row) {
				        $data[] = $row;
				    }
				}

        return $data;
	}

	function add(){

		$assetName = $this -> commonlib -> cleanData($this -> input -> post('a_name'));
		$description = $this -> commonlib -> cleanData($this -> input -> post('a_description'));
		$installationYear = $this -> commonlib -> cleanData($this -> input -> post('a_installationyear'));
		$expectedUsefulLife = $this -> commonlib -> cleanData($this -> input -> post('a_expectedusefullife'));
		$renewalYear = $this -> commonlib -> cleanData($this -> input -> post('a_renewalyear'));
		$condition = $this -> commonlib -> cleanData($this -> input -> post('a_condition'));
		$quantity = $this -> commonlib -> cleanData($this -> input -> post('a_quantity'));
		$unitCost = $this -> commonlib -> cleanData($this -> input -> post('a_unitcost'));
		$estimatedCost = $this -> commonlib -> cleanData($this -> input -> post('a_estimatedcost'));

		if($installationYear==""){
			$installationYear=0;
		}
		if($expectedUsefulLife==""){
			$expectedUsefulLife=0;
		}
		if($renewalYear==""){
			$renewalYear=0;
		}
		if($quantity==""){
			$quantity=0;
		}
		if($unitCost==""){
			$unitCost=0;
		}
		if($estimatedCost==""){
			$estimatedCost=0;
		}

		$this->db->trans_begin();

		$query = "INSERT INTO assets(
						  `assetName` ,
						  `description` ,
						  `installationYear` ,
						  `expectedUsefulLife` ,
						  `renewalYear` ,
						  `assetCondition` ,
						  `quantity` ,
						  `unitCost`,
						  `estimatedCost` )
          	VALUES ('$assetName','$description','$installationYear','$expectedUsefulLife','$renewalYear','$condition','$quantity','$unitCost','$estimatedCost'
			)";

			$result = $this -> db -> query($query);
			$id = $this -> db -> insert_id();

			if ($this -> db -> trans_status() == false ) {
				$this -> db -> trans_rollback();
				return 0;
			} else {
				$this -> db -> trans_commit();	
				// log queries here if protocol requires		
				return 1; // return $id if required
			}
	}

	function edit(){

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

		if($installationYear==""){
			$installationYear=0;
		}
		if($expectedUsefulLife==""){
			$expectedUsefulLife=0;
		}
		if($renewalYear==""){
			$renewalYear=0;
		}
		if($quantity==""){
			$quantity=0;
		}
		if($unitCost==""){
			$unitCost=0;
		}
		if($estimatedCost==""){
			$estimatedCost=0;
		}

		$oldResult = $this->view($assetId);
		$publishHistory=0;
		$changeHistoryStr="";
		if($assetName!=$oldResult[0]['assetName']){
			$publishHistory=1;
			$changeHistoryStr.=" changed assetName from ".$oldResult[0]['assetName']." to ".$assetName." on ".date("d-m-Y H:i:s")."<br><br>";

		}

		$this->db->trans_begin();

		$query = "UPDATE assets SET 
						  assetName  = '$assetName',
						  description = '$description',
						  installationYear = $installationYear,
						  expectedUsefulLife = '$expectedUsefulLife',
						  renewalYear = $renewalYear,
						  assetCondition = '$condition',
						  quantity = $quantity,
						  unitCost = '$unitCost',
						  estimatedCost = '$estimatedCost' 
          	WHERE assetId = ".$assetId;

			$result = $this -> db -> query($query);

			if ($this -> db -> trans_status() == false ) {
				$this -> db -> trans_rollback();
				return 0;
			} else {
				$this -> db -> trans_commit();	
				// log queries here if protocol requires		
				// save history here as well
				if($publishHistory==1){
					$this -> save_history($assetId,$_SESSION['userId'],$changeHistoryStr);
				}
				return 1; // return $assetId if required
			}
		
	}

	function delete_asset(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('d_assetId'));

		$this->db->trans_begin();

		//  we can opt for soft delete as well if protocol requires

		$query="DELETE FROM asset_attachment WHERE assetId =".$assetId;
		$this->db->query($query);

		$query="DELETE FROM assets WHERE assetId =".$assetId;
		$this->db->query($query);

		if ($this -> db -> trans_status() == false ) {
				$this -> db -> trans_rollback();
				return 0;
			} else {
				$this -> db -> trans_commit();	
				// log queries here if protocol requires		
				// save history here as well 
				return 1; // return $assetId if required
			}
		
	}

	function save_history($assetId,$userId,$str){

		$query="INSERT INTO asset_history (assetId,userId,changeHistory) values (".$assetId.",".$userId.",'".$_SESSION['userName'].$str."')";
		$this->db->query($query);

	}
	function showhistory(){

		$query="SELECT changeHistory from asset_history ";
		$execQuery=$this->db->query($query);
		$data = array();
		$str="";

				if($execQuery !== FALSE && $execQuery->num_rows() > 0){
				    foreach ($execQuery->result_array() as $row) {
				        $str.= $row['changeHistory'];
				    }
				}
		$data['str']=$str;

        return $data;

	}

	function fetchuser(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('assetId'));
		$query="select userId,userName from users where userId NOT IN (select userId from asset_user_map) union select aum.userId,u.userName from asset_user_map aum left join users u on aum.userId=u.userId where aum.assetId=".$assetId."";
		$execQuery=$this->db->query($query);
		return $execQuery;

	}
	function fetchselecteduser(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('assetId'));

		$query="select userId from asset_user_map WHERE assetId = ".$assetId."
        ";
        
        $res=$this->db->query($query)->result_array();
        return $res;

	}

	function mapuser(){

		$assetId = $this -> commonlib -> cleanData($this -> input -> post('assetId'));
		$userId = $this -> commonlib -> cleanData($this -> input -> post('userId'));

		$query="DELETE FROM asset_user_map WHERE assetId =".$assetId;
		$this->db->query($query);

		if($userId!="" && $userId!=0){

			$query="INSERT INTO asset_user_map (assetId,userId) values (".$assetId.",".$userId.")";
			$this->db->query($query);
		}

        return;

	}


  }
?>