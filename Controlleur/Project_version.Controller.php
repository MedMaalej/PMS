	<?php
	include_once ("../includes/Connection.inc.php");
	include_once ("../Modele/Project_version.class.php");
	
	$projectId = "";
	$versionId = "";
	$description = "";
	
	//recuperation des variables
	if (isset($_REQUEST['projectId']))
		$projectId = $_REQUEST['projectId'];
	
	if (isset($_REQUEST['versionId']))
		$versionId = $_REQUEST['versionId'];
	
	if (isset($_REQUEST['description']))
		$description = $_REQUEST['description'];
	
	$project_version = new Project_version($projectId, $versionId, $description);
	switch ($action) {
	
		case "addButton" :
			include "../Vue/project_version/add.view.php";
			break;
	
		case "addDB" :
			$project_version -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $project_version -> selectCurrent($projectId, $versionId, $connexion);
			include "../Vue/project_version/update.view.php";
			break;
	
		case "updateDB" :
			$project_version -> update($connexion);
			break;
	
		case "delete" :
			$project_version -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $project_version -> getAll($connexion);
			include "../Vue/project_version/getAll.view.php";
			break;
	}
	?>
	
