<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseService.class.php');
class InsertNewExerciseAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) { 
            session_start();
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

        // Insert the new exercise
        $exerciseService = new ExerciseService();
        $exerciseService->insert($newExercise);

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