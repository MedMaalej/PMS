	<?php
	include_once ("../includes/Connection.inc.php");
	include_once ("../Modele/Timetracking.class.php");
	
	$taskId = "";
	$taskLogDescription = "";
	$taskLogCreator = "";
	$taskLogHours = "";
	$taskLogDate = "";
	
	//recuperation des variables
	if (isset($_REQUEST['taskId']))
		$taskId = $_REQUEST['taskId'];
	
	if (isset($_REQUEST['taskLogDescription']))
		$taskLogDescription = $_REQUEST['taskLogDescription'];
	
	if (isset($_REQUEST['taskLogCreator']))
		$taskLogCreator = $_REQUEST['taskLogCreator'];
	
	if (isset($_REQUEST['taskLogHours']))
		$taskLogHours = $_REQUEST['taskLogHours'];
	
	if (isset($_REQUEST['taskLogDate']))
		$taskLogDate = $_REQUEST['taskLogDate'];
	
	$timetracking = new Timetracking($taskId, $taskLogDescription, $taskLogCreator, $taskLogHours, $taskLogDate);
	
	switch ($action) {
	
		case "addButton" :
			include "../Vue/timetracking/add.view.php";
			break;
	
		case "addDB" :
			$timetracking -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $timetracking -> selectCurrent($taskId, $taskLogCreator, $taskLogDate, $connexion);
			include "../Vue/timetracking/update.view.php";
			break;
	
		case "updateDB" :
			$timetracking -> update($connexion);
			break;
	
		case "delete" :
			$timetracking -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $timetracking -> getAll($connexion);
			include "../Vue/timetracking/getAll.view.php";
			break;
	}
	?>
	
