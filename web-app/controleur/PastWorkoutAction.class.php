<?php
require_once('./controleur/Action.interface.php');
class PastWorkoutAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();
		// -- temporarly disabled since there are no connection
		//if (!ISSET($_SESSION["connected"]))
		//	return "default";
		echo "In the past workout action";
		return "pastWorkout";
	}
}
?>