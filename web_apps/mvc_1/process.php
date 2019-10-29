<?php

session_start();

// check if there is a model in the session
// otherwise initialise a new model
if(empty($_SESSION['db'])){
	$myModel = new Model();
} else {
		// $myModel = new Model();
	$myModel = unserialize($_SESSION['db']);
}


if (isset($_POST['save'])){
	if(!empty($_POST['name']) && !empty($_POST['location'])){
		$myModel->addUser($_POST['name'],$_POST['location']);

		$_SESSION['message'] = "Record has been saved";
		$_SESSION['msg_type'] = "success";
		reloadPage();
	}else{
		return;
	}
}


if (isset($_GET['delete'])){
	$myModel->deleteUser($_GET['delete']);

	$_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";

	reloadPage();
	
}



if (isset($_GET['edit'])){
	$user = $myModel->getUser($_GET['edit']);
	return $user;
}


if (isset($_POST['update'])){
	if(!empty($_POST['name']) && !empty($_POST['location'])){
		$myModel->editUser((int)$_POST['id'], $_POST['name'],$_POST['location']);

		reloadPage();
	}else{
		return;
	}
}


// store the updated db in the php session

function getUserId($user){
	$userName = $user['name'];
	global $myModel;

 	$userId = $myModel->getUserId($userName);

	return $userId;
}

function reloadPage(){
	$_SESSION['db'] = serialize($myModel); 
	header("location: index.php");
}
	$_SESSION['db'] = serialize($myModel); 

	
?>