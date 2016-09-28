<?php
	include ('../includes/Connection.inc.php');
	// Database connection call
	include ('../modele/Version.class.php');
	
	$versionId = "";
	$versionName = "";
	
	//Values Retrieved
	if (isset($_REQUEST['versionId']))
		$versionId = $_REQUEST['versionId'];
	
	if (isset($_REQUEST['versionName']))
		$versionName = $_REQUEST['versionName'];
	
	$version = new Version($versionId, $versionName);
	
	switch ($action) {
	
		case "addButton" :
			include "../vue/version/add.view.php";
			break;
	
		case "addDB" :
			$version -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $version -> selectCurrent($versionId, $connexion);
	
			include "../vue/version/update.view.php";
	
			break;
	
		case "updateDB" :
			$version -> update($connexion);
			break;
	
		case "deleteDB" :
			$version -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $version -> getAll($connexion);
			include "../vue/version/getAll.view.php";
			break;
	}
