<?php
	include "../include/Connection.inc.php";
	include "../Modele/Project_categorie.class.php";
	
	$projectCategorieId = "";
	$categorieName = "";
	
	
	//recuperation des variables
	if (isset($_REQUEST['projectCategorieId']))
		$projectCategorieId = $_REQUEST['projectCategorieId'];
	
	if (isset($_REQUEST['categorieName']))
		$categorieName = $_REQUEST['categorieName'];
	
	
	
	$projectCategorie = new Project_categorie($projectCategorieId,$categorieName);
	switch ($action) {
	
		case "addButton" :
			include "../vue/project_categorie/add.View.php";
			break;
	
		case "addDB" :
			$projectCategorie ->add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $projectCategorie -> selectCurrent($projectCategorieId,$connexion);
			include "../vue/project_categorie/update.View.php";
			break;
	
		case "upadteBD" :
			$projectCategorie -> update($connexion);
			break;
	
		case "delete" :
			$projectCategorie ->delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $projectCategorie->getAll($connexion);
			include "../vue/project_categorie/getAll.View.php";
			break;
	
	}
?>
	
