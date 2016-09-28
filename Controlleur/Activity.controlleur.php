<?php
	include ('../includes/Connection.inc.php');
	// Database connection call
	include ('../modele/Activity.class.php');
	
	$activityId = "";
	$activityShortName = "";
	$activityName = "";
	$activityDescription = "";
	
	//Values Retrieved
	if (isset($_REQUEST['activityId']))
		$activityId = $_REQUEST['activityId'];
	
	if (isset($_REQUEST['activityShortName']))
		$activityShortName = $_REQUEST['activityShortName'];
	
	if (isset($_REQUEST['activityName']))
		$activityName = $_REQUEST['activitytName'];
	
	if (isset($_REQUEST['activityDescription']))
		$activityDescription = $_REQUEST['activityDescription'];
	
	$activity = new Activity($activityId, $activityShortName, $activityName, $activityDescription);
	
	switch ($action) {
	
		case "addButton" :
			include "../vue/activity/add.view.php";
			break;
	
		case "addDB" :
			$activity -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $activity -> selectCurrent($activityId, $connexion);
			include "../vue/activity/update.view.php";
	
			break;
	
		case "updateDB" :
			$activity -> update($connexion);
			break;
	
		case "deleteDB" :
			$activity -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $activity -> getAll($connexion);
			include "../vue/activity/getAll.view.php";
			break;
	}
?>