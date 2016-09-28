<?php
include "./includes/Connexion.inc.php";
include "./Modele/Project.class.php";

$projectId = "";
$projectName = "";
$projectDescription = "";
$projectCategorieId = "";
$invoicingId = "";
$clientId = "";

//recuperation des variables
if (isset($_REQUEST['projectId']))
	$projectId = $_REQUEST['projectId'];
if (isset($_REQUEST['projectName']))
	$projectName = $_REQUEST['projectName'];
if (isset($_REQUEST['projectDescription']))
	$projectDescription = $_REQUEST['projectDescription'];
if (isset($_REQUEST['projectCategorieId']))
	$projectCategorieId = $_REQUEST['projectCategorieId'];
if (isset($_REQUEST['invoicingId']))
	$invoicingId = $_REQUEST['invoicingId'];
if (isset($_REQUEST['clientId']))
	$clientId = $_REQUEST['clientId'];

$proj = new Project($projectId, $projectName, $projectDescription, $projectCategorieId, $invoicingId, $clientId);
switch ($action) {

	case "addButton" :
		include "../Vue/project/add.View.php";
		break;

	case "addDB" :
		$proj ->add($connexion);
		break;

	case "updateButton" :
		$resUpdate=$proj ->selectCurrent($projectId,$connexion);
		include "../Vue/project/update.View.php";
		break;

	case "updateDB" :
		$proj ->update($connexion);
		break;

	case "deleteDB" :
		$proj ->delete($connexion);
		break;

	case "getallDB" :
		$resGetAll = $proj ->getAll($connexion);
		include "../Vue/project/getAll.View.php";
		break;
}
