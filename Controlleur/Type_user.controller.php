	<?php
	include_once ("../includes/Connection.inc.php");
	include_once ("../Modele/Type_user.class.php");
	
	$typeId = "";
	$typeDescription = "";
	
	//recuperation des variables
	if (isset($_REQUEST['typeId']))
		$typeId = $_REQUEST['typeId'];
	
	if (isset($_REQUEST['typeDescription']))
		$typeDescription = $_REQUEST['typeDescription'];
	
	$type_user = new Type_user($typeId, $typeDescription);
	
	switch ($action) {
	
		case "addButton" :
			include "../Vue/type_user/add.view.php";
			break;
	
		case "addDB" :
			$type_user -> add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $type_user -> selectCurrent($typeId, $connexion);
			include "../Vue/type_user/update.view.php";
			break;
	
		case "updateDB" :
			$type_user -> update($connexion);
			break;
	
		case "delete" :
			$type_user -> delete($connexion);
			break;
	
		case "getAll" :
			$resGetAll = $type_user -> getAll($connexion);
			include "../Vue/type_user/getAll.view.php";
			break;
	}
	?>
	
