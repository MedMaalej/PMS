	<?php
	include ('../includes/Connection.inc.php');
	// Database connection call
	include ('../modele/Feedback.class.php');
	
	$fbId = "";
	$fbTaskId = "";
	$fbCode = "";
	$fbSeverity = "";
	$fbPriority = "";
	$fbDescription = "";
	$fbComment = "";
	$fbCreationDate = "";
	$fbCreationUser = "";
	$fbCorrectionUser = "";
	$fbCorrectionStatus = "";
	$fbCorrectionDate = "";
	$fbCorrectionComment = "";
	$fbValidationDate = "";
	$fbValidationStatus = "";
	$fbValidationUser = "";
	$fbValidationComment = "";
	$fbStatus = "";
	
	//Values Retrieved
	if (isset($_REQUEST['fbId']))
		$fbId = $_REQUEST['fbId'];
	
	if (isset($_REQUEST['fbTaskId']))
		$fbTaskId = $_REQUEST['fbTaskId'];
	
	if (isset($_REQUEST['fbCode']))
		$fbCode = $_REQUEST['fbCode'];
	
	if (isset($_REQUEST['fbSeverity']))
		$fbSeverity = $_REQUEST['fbSeverity'];
	
	if (isset($_REQUEST['fbPriority']))
		$fbPriority = $_REQUEST['fbPriority'];
	
	if (isset($_REQUEST['fbDescription']))
		$fbDescription= $_REQUEST['fbDescription'];
		
	if (isset($_REQUEST['fbComment']))
		$fbComment = $_REQUEST['fbComment'];
		
	if (isset($_REQUEST['fbCreationDate']))
		$fbCreationDate = $_REQUEST['fbCreationDate'];
	
	if (isset($_REQUEST['fbCreationUser']))
		$fbCreationUser= $_REQUEST['fbCreationUser'];
	
	if (isset($_REQUEST['fbCorrectionUser']))
		$fbCorrectionUser = $_REQUEST['fbCorrectionUser'];
	
	if (isset($_REQUEST['fbCorrectionStatus']))
		$fbCorrectionStatus = $_REQUEST['fbCorrectionStatus'];
	
	if (isset($_REQUEST['fbCorrectionDate']))
		$fbCorrectionDate = $_REQUEST['fbCorrectionDate'];
	
	if (isset($_REQUEST['fbCorrectionComment']))
		$fbCorrectionComment = $_REQUEST['fbCorrectionComment'];
		
	if (isset($_REQUEST['fbValidationDate']))
		$fbValidationDate = $_REQUEST['fbValidationDate'];
	
	if (isset($_REQUEST['fbValidationStatus']))
		$fbValidationStatus = $_REQUEST['fbValidationStatus'];
	
	if (isset($_REQUEST['fbValidationUser']))
		$fbValidationUser= $_REQUEST['fbValidationUser'];
	
	if (isset($_REQUEST['fbValidationComment']))
		$fbValidationComment = $_REQUEST['fbValidationComment'];
		
	if (isset($_REQUEST['fbStatus']))
		$fbStatus = $_REQUEST['fbStatus'];
		
	$feedback = new Feedback($fbId, $fbTaskId, $fbCode, $fbSeverity, $fbPriority, $fbDescription, $fbComment, $fbCreationDate, $fbCreationUser, $fbCorrectionUser, $fbCorrectionStatus, $fbCorrectionDate, $fbCorrectionComment, $fbValidationDate, $fbValidationStatus, $fbValidationUser, $fbValidationComment, $fbStatus);
	
	switch ($action) {
	
		case "addButton" :
			include "../vue/feedback/add.view.php";
			break;
	
		case "addDB" :
			$feedback -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $feedback -> selectCurrent($fbId, $connexion);
			include "../vue/feedback/update.view.php";
	
			break;
	
		case "updateDB" :
			$feedback -> update($connexion);
			break;
	
		case "deleteDB" :
			$feedback -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $feedback -> getAll($connexion);
			include "../vue/feedback/getAll.view.php";
			break;
	}
