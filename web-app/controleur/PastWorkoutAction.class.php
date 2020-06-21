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
		$exercises = array();
		$currentDate = gmdate("Y-m-j h:i:s");
		date_default_timezone_set("America/New_York");

		// Fetching the data
		$exercises = $exerciseService->selectAllOrderByDateAsc();

		// Filter for the values from this week
		$_REQUEST['thisWeekExercise'] = array();
		foreach($exercises as $exercise) {
			// True if the date as less than 8 days of difference
			$difference = date_diff((new DateTime($exercise->getDate())), (new DateTime($currentDate)));
			if( $difference->format('%a') < 8) {
				array_push($_REQUEST['thisWeekExercise'],$exercise);
			}
		}
		
		// Filter for the values from the last Two Weeks
		$_REQUEST['lastTwoWeeksExercise'] = array();
		foreach($exercises as $exercise) {
			$difference = date_diff((new DateTime($exercise->getDate())), (new DateTime($currentDate)));
			// True if the date as more than 7 and less than 22 days of difference
			if($difference->format('%a') > 7 && $difference->format('%a') < 22) {
				array_push($_REQUEST['lastTwoWeeksExercise'],$exercise);
			}
		}

		// Filter for the values from the last Two Weeks
		$_REQUEST['moreThanTwoWeeksExercise'] = array();
		foreach($exercises as $exercise) {
			$difference = date_diff((new DateTime($exercise->getDate())), (new DateTime($currentDate)));
			// True if the date as less than 22 days of difference
			if($difference->format('%a') > 21) {
				array_push($_REQUEST['moreThanTwoWeeksExercise'],$exercise);
			}
		}

		return "pastWorkout";
	}
}
?>