<?php
require_once('./controleur/Action.interface.php');
class NewWorkoutAction implements Action {
	public function execute(){
		return "newWorkout"; // TEMPORAIRE
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connected"]))
			return "newWorkout";
		return "default";
	}
}
?>