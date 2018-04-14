<?php

function getAllClients(){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM clients";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function getClientsById($id){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `clients` where client_id = :id ";
	$query = $db->prepare($sql);
	$query->bindParam(":id", $id);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function newClient($data){
	$db = openDatabaseConnection();
	$sql = $db->prepare("INSERT INTO clients (client_firstname , client_lastname)
	VALUES (:client_firstname, :client_lastname);");
		$sql->bindParam(':client_firstname',$data['client_firstname'],PDO::PARAM_STR);
			$sql->bindParam(':client_lastname',$data['client_lastname'],PDO::PARAM_INT);
	$sql->execute();
}

function deleteThisClient($id) {
	$db = openDatabaseConnection();
		$sql = $db->prepare("DELETE FROM clients WHERE client_id = :id");
			$sql->bindParam(":id", $id);
	$sql->execute();
}

function update($answers){
	$db = openDatabaseConnection();
	$sql = "UPDATE clients SET client_firstname = :client_firstname, client_lastname = :client_lastname WHERE client_id = :id";
	$query = $db->prepare($sql);
	$query->bindParam(":client_firstname", $answers['client_firstname']);
	$query->bindParam(":client_lastname", $answers['client_lastname']);
	$query->bindParam(":id", $answers['id']);
	$query->execute();
}