<?php

class Model{

 var $users;

 function __construct(){
 	$this->users=array(
 		array(
 			"name" => 'rajiv',
 			"location" => "utrecht"
 		),
 		array(
 			"name" => 'paula',
 			"location" => "Nieuwegein"
 		)
 	);
 }


 function getUsers(){
 	return $this->users;
 }


 function getUserNames(){
 	$usernames = array();
 	foreach ($this->users as $userObject) {
		array_push($usernames, $userObject['name']);
 	}
 	return $usernames;
 }


 function addUser($name,$location){ 
 	array_push($this->users, array("name" => $name, "location" => $location));
 }


 function deleteUser($id){
 	unset($this->users[$id]);
 }


 function getUser($id){
 	return $this->users[$id];
 }

 function getUserId($name){
 	$userId = "";
 	foreach ($this->users as $key => $userObject) {
 		if ($userObject['name'] == $name){
 			$userId = $key;
 			break;
 		}
 	}
 	return $userId;
 }

 function editUser($id, $name, $location){
 	$this->users[$id]['name'] = $name;
 	$this->users[$id]['location'] = $location;
 }

}

?>
