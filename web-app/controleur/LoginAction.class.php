<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseNamesService.class.php');
require_once('/model/classe/ExerciseNames.class.php');
class LoginAction implements Action {
	public function execute(){

		// Generate the list of exercise names
		$exerciseNamesService = new ExerciseNamesService();
		$exerciseNames = array();

		// Get the names
		$exerciseNames = $exerciseNamesService->selectAll();

		// Send them to the view
		$_REQUEST['exerciseNames'] = array();
		foreach($exerciseNames as $name) {
			array_push($_REQUEST['exerciseNames'], $name);
		}
		return "newWorkout"; // TEMPORAIRE


		if (!ISSET($_REQUEST["adresse"])) { return "login"; }
		if (!$this->valide()) { return "login"; }
		require_once('./modele/CompteDAO.class.php');
		$cDao = new CompteDAO();
		$compte = $cDao->find($_REQUEST["adresse"]);
		if ($compte == null){
			$_REQUEST["field_messages"]["adresse"] = "Utilisateur inexistant.";	
			return "login";
		}
		else if ($compte->getMotDePasse() != $_REQUEST["password"]){
			$_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
			return "login";
		}
		if (!ISSET($_SESSION)) { session_start(); }
		$_SESSION["connected"] = $_REQUEST["adresse"];
		$_SESSION["nom"] = $cDao->findNomByEmail($_REQUEST["adresse"]);
		return "default";
	}

	public function valide()
	{
		$result = true;
		if ($_REQUEST['adresse'] == ""){
			$_REQUEST["field_messages"]["adresse"] = "Donnez votre nom d'utilisateur";
			$result = false;
		}	
		if ($_REQUEST['password'] == ""){
			$_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
			$result = false;
		}	
		return $result;
	}
}
?>