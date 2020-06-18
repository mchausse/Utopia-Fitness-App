<?php
require_once('./controleur/Action.interface.php');
class LoginAction implements Action {
	public function execute(){
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