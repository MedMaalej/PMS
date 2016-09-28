	<?php
	include "./includes/Connexion.inc.php";
	include "./Modele/TaskGroup.class.php";
	
	$taskGroupId="";
	$taskGroupName="";
	$projectId="";
	$responsibleId="";
	$technicalCoachId="";
	$deliveryDate="";
	$receivedOn="";
	$answeredOn="";
	$statusId="";
	
	//recuperation des variables
	if (isset($_REQUEST['taskGroupId']))
		$taskGroupId = $_REQUEST['taskGroupId'];
	if (isset($_REQUEST['taskGroupName']))
		$taskGroupName = $_REQUEST['taskGroupName'];
	if (isset($_REQUEST['projectId']))
		$projectId = $_REQUEST['projectId'];
	if (isset($_REQUEST['responsibleId']))
		$responsibleId = $_REQUEST['responsibleId'];
	if (isset($_REQUEST['technicalCoachId']))
		$technicalCoachId = $_REQUEST['technicalCoachId'];
	if (isset($_REQUEST['deliveryDate']))
		$deliveryDate = $_REQUEST['deliveryDate'];
	if (isset($_REQUEST['receivedOn']))
		$receivedOn = $_REQUEST['receivedOn'];
	if (isset($_REQUEST['answeredOn']))
		$answeredOn = $_REQUEST['answeredOn'];
	if (isset($_REQUEST['statusId']))
		$statusId = $_REQUEST['statusId'];
		
	$tg = new TaskGroupe($taskGroupId,$taskGroupName,$projectId,$responsibleId,$technicalCoachId,$deliveryDate,$receivedOn,$answeredOn,$statusId);
	switch ($action) {
	
		case "addButton" :
			include "../Vue/taskgroup/add.View.php";
			break;
	
		case "addDB" :
			$tg ->add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $tg ->selectCurrent($taskGroupId,$connexion);
			include "../Vue/taskgroup/update.View.php";
			break;
	
		case "updateDB" :
			$tg ->update($connexion);
			break;
	
		case "deleteDB" :
			$tg ->delete($connexion);
			break;
	
		case "getallDB" :
			$resGetAll = $tg ->getAll($connexion);
			include "../Vue/taskgroup/getAll.View.php";
			break;
	}
