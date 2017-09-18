  <?php

require_once '../includes/DbOperations.php';

$responce = array();  

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	if(
	   isset($_POST['username']) and
	   isset($_POST['email']) and
	   isset($_POST['password']))
	
	{
		//operate the data further 
		
		
		$db = new DbOperations();
		
		
		$result = $db->createUser( $_POST['username'],
		                           $_POST['password'],
		                           $_POST['email']
		                        );
		if($result == 1){	
		    $responce['error'] = false;
            $responce['message'] ="user registration succesfully";		
		}elseif($result == 2){
		    $responce['error'] = false;
            $responce['message'] ="some error occur";
		
		}elseif($result == 0){
			$responce['error'] = false;
            $responce['message'] ="It seems you are already registered , please choose";
			
		}
		
		
		
	}else{ 
	$responce['error'] =true;
	$responce['message']= "Required fields are missiong";
	}

}else{
	$responce['error'] =true;
	$responce['message']= "Invalid Request";

}

echo json_encode($responce);