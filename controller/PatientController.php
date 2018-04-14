<?php

require(ROOT . "model/PatientModel.php");
require(ROOT . "model/SpeciesModel.php");

function patients()
{
	render("hospital/patients",
		array(
			'patients' => joinAllPatients()  
		)
	);
}

 function createPatient(){
 	if($_SERVER['REQUEST_METHOD'] == "POST"){
 		$data=array(
 			'patient_name' => $_POST['patient_name'],
 			'patient_status' => $_POST['patient_status'],
 			'patient_gender' => $_POST['patient_gender'],
 			'species_id' => $_POST['species_id'],
 			'species_description' => $_POST['species_description']
 		);
 		newPatient($data);
 			echo "<script>alert('Patient toegevoegd'); window.location = '/hospital/';</script>";
 	}
 	render("hospital/patients/create");
 }

function createNewPatient(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'patient_name' => $_POST['patient_name'],
			'patient_status' => $_POST['patient_status'],
			'patient_gender' => $_POST['patient_gender'],
			'species_id' => $_POST['species_id'],
			'species_description' => $_POST['species_description']
		);
		newPatient($data); 
			echo "<script>alert('Patient toegevoegd'); window.location = '". URL ."patient/patients';</script>";
	}
	render("hospital/patients/createNew",
	array('species' => getAllSpecies() , ));
}

function deletePatient($id){
		$patient = getPatientsById($id);
	render("hospital/patients/delete", ['patient' => $patient]);
}
function deleteAPatient($id){
	deleteThisPatient($id); 
echo "<script>alert('Patiënt verwijderd'); window.location = '". URL ."patient/patients';</script>";
}

function changePatient($id){
		$patient = getPatientsById($id);
	render("hospital/patients/edit", ['patient' => $patient]);
}

function changeEdit(){
		updatePatient($_POST);
	echo "<script>alert('Patiënt is aangepast'); window.location = '". URL ."patient/patients';</script>";
}