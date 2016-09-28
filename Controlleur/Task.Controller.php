<?php
	include "../include/Connection.inc.php";
	include "../Modele/Task.class.php";
	
	 
	$taskId="";
    $taskName="";
	$taskDescription=""; 
	$taskStartDate="";
	$taskEndDate="";
	$taskDuration="";
	$taskGroupId="";
	$taskOwner="";
	$activityId="";
	$isActivated="";
	$projectId="";
	
	
	//recuperation des variables
	if (isset($_REQUEST['taskId']))
		$taskId = $_REQUEST['taskId'];
	
	if (isset($_REQUEST['taskName']))
		$taskName = $_REQUEST['taskName'];
	
	if (isset($_REQUEST['taskDescription']))
		$taskDescription = $_REQUEST['taskDescription'];
	
	if (isset($_REQUEST['taskStartDate']))
		$taskStartDate = $_REQUEST['taskStartDate'];
	
	if (isset($_REQUEST['taskEndDate']))
		$taskEndDate = $_REQUEST['taskEndDate'];
	
	if (isset($_REQUEST['taskDuration']))
		$taskDuration = $_REQUEST['taskDuration'];
	
	if (isset($_REQUEST['taskGroupId']))
		$taskGroupId = $_REQUEST['taskGroupId'];
	
	if (isset($_REQUEST['taskOwner']))
		$taskOwner = $_REQUEST['taskOwner'];
	
	if (isset($_REQUEST['activityId']))
		$activityId = $_REQUEST['activityId'];
	
	if (isset($_REQUEST['isActivated']))
		$isActivated = $_REQUEST['isActivated'];
	
	if (isset($_REQUEST['projectId']))
		$projectId = $_REQUEST['projectId'];
	
	
	
	$task = new Task($taskId,$taskName,$taskDescription,$taskStartDate,$taskEndDate,$taskDuration,$taskGroupId,$taskOwner,$activityId,$isActivated,$projectId);
	switch ($action) {
	
		case "addButton" :
			include "../vue/task/add.View.php";
			break;
	
		case "addDB" :
			$task ->add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $task -> selectCurrent($taskId,$connexion);
			include "../vue/task/update.View.php";
			break;
	
		case "upadteBD" :
			$task -> update($connexion);
			break;
	
		case "delete" :
			$task ->delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $task->getAll($connexion);
			include "../vue/task/getAll.View.php";
			break;
	
	}
?>
	
