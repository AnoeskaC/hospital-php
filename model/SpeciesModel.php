<?php

function getAllSpecies(){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM species";
	$query = $db->prepare($sql);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function getSpeciesById($id){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `species` where species_id = :id ";
	$query = $db->prepare($sql);
	$query->bindParam(":id", $id);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function newSpec($data){
	$db = openDatabaseConnection();
	$sql = $db->prepare("INSERT INTO species (species_description)
	VALUES (:species_description);");
	$sql->bindParam(':species_description',$data['species_description'],PDO::PARAM_STR);
	$sql->execute();
}

function deleteThisSpecies($id) {
	$db = openDatabaseConnection();
		$sql = $db->prepare("DELETE FROM species WHERE species_id = :id");
		$sql->bindParam(":id", $id);
	$sql->execute();
}

function updateSpecies($answers){
	$db = openDatabaseConnection();
	$sql = "UPDATE species SET species_description = :species_description WHERE species_id = :id";
	$query = $db->prepare($sql);
	$query->bindParam(":species_description", $answers['species_description']);
	$query->bindParam(":id", $answers['id']);
	$query->execute();
}
