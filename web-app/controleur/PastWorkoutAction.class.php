<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseService.class.php');
require_once('/model/classe/Exercise.class.php');

class PastWorkoutAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) { 
			session_start(); 
		}

		// Initiating variables
		$exerciseService = new ExerciseService();
		$_REQUEST['pastExerciseArray'] = array();

		// Fetching the data
		$_REQUEST['pastExerciseArray'] = $exerciseService->selectAllOrderByDateAsc();

		return "pastWorkout";
	}
}
?>