<?php
require_once '../includes/DbOperations.php';
$responce = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['username']) and isset($_POST['password'])){
		$db = new DbOperations();
		if($db->userLogin($_POST['username'], $_POST['password'])){
			
			$user = $db->getUserByUsername($_POST['username']);
			$responce['error']=false;
			$responce['id']=$user['id'];
			$responce['email']=$user['email'];
			$responce['username']=$user['username'];
			
			
			
		}else{
			$responce['error'] = true;
		    $responce['message'] = "Invalid User name or password";
			
		}
		
	}else{
		$responce['error'] = true;
		$responce['message'] = "Required field is missing";
		
	}
	
	
	
	
	
	
}
echo json_encode($responce);
