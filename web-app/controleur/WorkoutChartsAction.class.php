<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseService.class.php');
require_once('/model/classe/Exercise.class.php');
class WorkoutChartsAction implements Action {
	public function execute() {
        
		if (!ISSET($_SESSION)) { 
            session_start();
        }

        // Get the values from the form 
        if(!ISSET($_REQUEST['name'])) {
            $idName = "5";
            $name = "biceps curl";
        } else {
            $idName = $_REQUEST['idName'];
            $name = $_REQUEST['name'];
        }

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
        
        // Get all the exercises
		$exerciseService = new ExerciseService();
		$_REQUEST['chartData'] = array();
        $chartData = array();
        
		// Fetching the data
        $result = $exerciseService->selectAllExerciseByName($idName);
        
        // Converting the data to a datatable
        $i = 0;
        $maxNumberOfRep = 0;
        foreach($result as $data) {
            $arrayTemp = array();
            array_push($arrayTemp, $i);
            $maxNumberOfRep = 0;

            // Create an array for the repetition string
            foreach(explode("/", $data->repetitions) as $rep) {
                array_push($arrayTemp, (int)$rep);
                $maxNumberOfRep++;
            }

            // Add the array of rep with the id to thethe data array
            array_push($chartData, $arrayTemp);
            $i++;
        }

        // Send the informations to the view
        $_REQUEST['maxNumberOfRep'] = $maxNumberOfRep;
        $_REQUEST['chartData'] = $chartData;

        return "workoutCharts";
    }
}
?>