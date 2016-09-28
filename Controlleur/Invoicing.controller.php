	<?php
	include "./includes/Connexion.inc.php";
	include "./Modele/Invoicing.class.php";
	
	$invoicingId="";
	$invoicingValue="";
	
	//recuperation des variables
	if (isset($_REQUEST['invoicingId']))
		$invoicingId = $_REQUEST['invoicingId'];
	
	if (isset($_REQUEST['invoicingValue']))
		$invoicingValue = $_REQUEST['invoicingValue'];
	
		
	$invoicing = new Invoicing($invoicingId,$invoicingValue);
	
	switch ($action) {
	
		case "addButton" :
			include "../Vue/invoicing/add.View.php";
			break;
	
		case "addDB" :
			$invoicing ->add($connexion);
			break;
	
		case "updateButton" :
			$resUpdate = $invoicing ->selectCurrent($invoicingId,$connexion);
			include "../Vue/invoicing/update.View.php";
			break;
	
		case "updateDB" :
			$invoicing ->update($connexion);
			break;
	
		case "deleteDB" :
			$invoicing ->delete($connexion);
			break;
	
		case "getallDB" :
			$resGetAll = $invoicing ->getAll($connexion);
			include "../Vue/invoicing/getAll.View.php";
			break;
	}
