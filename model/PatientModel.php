<?php
function getPatientsById($id){
	$db = openDatabaseConnection();
	$sql = "SELECT * FROM `patients`
			 where patient_id = :id ";
	$query = $db->prepare($sql);
	$query->bindParam(":id", $id);
	$query->execute();
	$db = null;
	return $query->fetchAll();
}

function joinAllPatients(){
		$db = openDatabaseConnection();
		$sql = "SELECT * FROM `patients`
					INNER JOIN `clients` on `patients`.`client_id` = `clients`.`client_id`
					INNER JOIN `species` on `patients`.`species_id` = `species`.`species_id`";
		$query = $db->prepare($sql);
		$query->execute();
			return $query->fetchAll();
}

function newPatient($data){
	$db = openDatabaseConnection();
	$sql = $db->prepare("INSERT INTO patients (patient_name , patient_status, patient_gender, species_id, species_description)
	VALUES (:patient_name, :patient_status, :patient_gender, :species_id, :species_description);");
		$sql->bindParam(':patient_name',$data['patient_name'],PDO::PARAM_STR);
		$sql->bindParam(':patient_status',$data['patient_status'],PDO::PARAM_INT);
		$sql->bindParam(':patient_gender',$data['patient_gender'],PDO::PARAM_INT);
		$sql->bindParam(':species_id',$data['species_id'],PDO::PARAM_INT);
		$sql->bindParam(':species_description',$data['species_description'],PDO::PARAM_INT);
	$sql->execute();
}

function deleteThisPatient($id) {
	$db = openDatabaseConnection();
		$sql = $db->prepare("DELETE FROM patients WHERE patient_id = :id");
		$sql->bindParam(":id", $id);
	$sql->execute();
}

function updatePatient($answers){
	$db = openDatabaseConnection();
	$sql = "UPDATE patients SET patient_name = :patient_name, patient_status = :patient_status, patient_gender = :patient_gender WHERE patient_id = :id";
	$query = $db->prepare($sql);
	$query->bindParam(":patient_name", $answers['patient_name']);
	$query->bindParam(":patient_status", $answers['patient_status']);
	$query->bindParam(":patient_gender", $answers['patient_gender']);
	$query->bindParam(":id", $answers['id']);
	$query->execute();
}