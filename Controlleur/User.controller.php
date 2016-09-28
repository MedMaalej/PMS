	<?php
	include_once ("../includes/Connection.inc.php");
	include_once ("../Modele/User.class.php");
	
	$userId = "";
	$userFirstName = "";
	$userLastName = "";
	$userShortName = "";
	$userType = "";
	$userLogin = "";
	$userPwd = "";
	$userMail = "";
	$userOwner = "";
	
	//recuperation des variables
	if (isset($_REQUEST['userId']))
		$userId = $_REQUEST['userId'];
	
	if (isset($_REQUEST['userFirstName']))
		$userFirstName = $_REQUEST['userFirstName'];
	
	if (isset($_REQUEST['userLastName']))
		$userLastName = $_REQUEST['userLastName'];
	
	if (isset($_REQUEST['userShortName']))
		$userShortName = $_REQUEST['userShortName'];
	
	if (isset($_REQUEST['userType']))
		$userType = $_REQUEST['userType'];
	
	if (isset($_REQUEST['userLogin']))
		$userLogin = $_REQUEST['userLogin'];
	
	if (isset($_REQUEST['userPwd']))
		$userPwd = $_REQUEST['userPwd'];
	
	if (isset($_REQUEST['userMail']))
		$userMail = $_REQUEST['userMail'];
	
	if (isset($_REQUEST['userOwner']))
		$userOwner = $_REQUEST['userOwner'];
	
	$user = new User($userId, $userFirstName, $userLastName, $userShortName, $userType, $userLogin, $userPwd, $userMail, $userOwner);
	switch ($action) {
	
		case "addButton" :
			include "../Vue/user/add.view.php";
			break;
	
		case "addDB" :
			$user -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $user -> selectCurrent($userId, $connexion);
			include "../Vue/user/update.view.php";
			break;
	
		case "updateDB" :
			$user -> update($connexion);
			break;
	
		case "delete" :
			$user -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $user -> getAll($connexion);
			include "../Vue/user/getAll.view.php";
			break;
	}
	?>
	
