<?php

require(ROOT . "model/SpeciesModel.php");

function species()
{
	render("hospital/species", 
		array(
			'species' => getAllSpecies() , ));
}

function createSpec(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'species_description' => $_POST['species_description'],
		);
		newSpec($data);
			echo "<script>alert('Diersoort toegevoegd'); window.location = '". URL ."patient/createPatient';</script>";
	}
	render("hospital/species/create");
}

function createNewSpec(){
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$data=array(
			'species_description' => $_POST['species_description'],
		);
		newSpec($data);
			echo "<script>alert('Diersoort toegevoegd'); window.location = '". URL ."species/species';</script>";
	}
	render("hospital/species/createNew");
}

function deleteSpecies($id){
		$species = getSpeciesById($id);
	render("hospital/species/delete", ['species' => $species]);
}
function deleteASpecies($id){
		deleteThisSpecies($id);
	echo "<script>alert('Diersoort verwijderd'); window.location = '/hospital/species/species';</script>";
}

function editSpecies($id){
		$species = getSpeciesById($id);
	render("hospital/species/edit", ['species' => $species]);
}

function saveSpeciesEdit(){
		updateSpecies($_POST);
	echo "<script>alert('Diersoort is aangepast'); window.location = '/hospital/species/species/';</script>";
}
