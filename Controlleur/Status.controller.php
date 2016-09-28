<?php
include "./includes/Connexion.inc.php";
include "./Modele/Status.class.php";

$statusId = "";
$statusName = "";
$statusDescription = "";

//recuperation des variables
if (isset($_REQUEST['statusId']))
	$statusId = $_REQUEST['statusId'];
if (isset($_REQUEST['statusName']))
	$statusName = $_REQUEST['statusName'];
if (isset($_REQUEST['statusDescription']))
	$statusDescription = $_REQUEST['statusDescription'];

$stat = new Status($statusId,$statusName,$statusDescription);
switch ($action) {

	case "addButton" :
		include "../Vue/status/add.View.php";
		break;

	case "addDB" :
		$stat ->add($connexion);
		break;

	case "updateButton" :
		$resUpdate = $stat ->selectCurrent( $statusId,$connexion);
		include "../Vue/status/update.View.php";
		break;

	case "updateDB" :
		$stat ->update($connexion);
		break;

	case "deleteDB" :
		$stat ->delete($connexion);
		break;

	case "getallDB" :
		$resGetAll = $stat ->getAll($connexion);
		include "../Vue/status/getAll.View.php";
		break;
}
