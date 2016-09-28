<?php
	include "../include/Connection.inc.php";
	include "../Modele/Client.class.php";
	
	$clientId = "";
	$clientShortName = "";
	$clientName = "";
	$clientCode = "";
	
	//recuperation des variables
	if (isset($_REQUEST['clientId']))
		$clientId = $_REQUEST['clientId'];
	
	if (isset($_REQUEST['clientShortName']))
		$clientShortName = $_REQUEST['clientShortName'];
	
	if (isset($_REQUEST['clientName']))
		$clientName = $_REQUEST['clientName'];
	
	if (isset($_REQUEST['clientCode']))
		$clientCode = $_REQUEST['clientCode'];
	
	$client = new Client($clientId,$clientShortName,$clientName,$clientCode);
	switch ($action) {
	
		case "addButton" :
			include "../vue/client/add.View.php";
			break;
	
		case "addDB" :
			$client ->add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $client -> selectCurrent($clientId,$connexion);
			include "../vue/client/update.View.php";
			break;
	
		case "updateBD" :
			$client -> update($connexion);
			break;
	
		case "delete" :
			$client ->delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $client->getAll($connexion);
			include "../vue/client/getAll.View.php";
			break;
	}
?>
	
