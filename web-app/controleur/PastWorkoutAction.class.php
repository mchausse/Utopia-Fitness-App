<?php
require_once('./controleur/Action.interface.php');
class PastWorkoutAction implements Action {
	public function execute(){
		return "pastWorkout";
		if (!ISSET($_SESSION)) session_start();
		if (!ISSET($_SESSION["connected"]))
			return "pastWorkout";
		return "default";
	}
}
?>