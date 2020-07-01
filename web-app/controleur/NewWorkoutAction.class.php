<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseNamesService.class.php');
require_once('/model/classe/ExerciseNames.class.php');
class NewWorkoutAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) session_start();

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

		return "newWorkout";
	}
}
?>