<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseService.class.php');
require_once('/model/service/ExerciseNamesService.class.php');
require_once('/model/classe/ExerciseNames.class.php');
class InsertNewExerciseAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) { 
            session_start();
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
        
        // Treat the incoming informations
        $newExercise = new Exercise();
        $newExercise->setName($_REQUEST['name']);
        $newExercise->setNbSeries($_REQUEST['nbSeries']);

        // setting each repetition value for the number of series registered
        $newExercise->setRepetitions("");
        for ($x = 1; $x <= $_REQUEST['nbSeries']; $x++) {
            if($_REQUEST['nbSeries'] == $x) {
                $newExercise->setRepetitions($newExercise->getRepetitions().$_REQUEST['repetition'.$x]);
            } else {
                $newExercise->setRepetitions($newExercise->getRepetitions().$_REQUEST['repetition'.$x]."/");
            }
        }

        // Forward the exercise count
        $_REQUEST["newExercise"] = $_REQUEST["newExercise"] + 1;

        // Insert the new exercise
        $exerciseService = new ExerciseService();
        $exerciseService->insert($newExercise);

        // Set exercise name
		foreach($exerciseNames as $name) {
            if($newExercise->getName() == $name->getId()) {
                array_push($_SESSION["newExerciseNames"], $name->getName());
                echo $name->getName();
            }
        }

        // Clear the values
        $newExercise = null;
        $_REQUEST['name'] = '';
        for ($x = 1; $x <= $_REQUEST['nbSeries']; $x++) {
            $_REQUEST['repetition'.$x] = '';
        }
        $_REQUEST['nbSeries'] = '';

        // Redirect to the view
		return "newWorkout";
	}
}
?>