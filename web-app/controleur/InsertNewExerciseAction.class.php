<?php
require_once('./controleur/Action.interface.php');
require_once('/model/service/ExerciseService.class.php');
class InsertNewExerciseAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) { 
            session_start();
        }
        // --------------- Remoed temporairly ----------------
		//if (!ISSET($_SESSION["connected"])) {
        //    return "login";
        //}

        // Treat the incoming informations
        $newExercise = new Exercise();
        $newExercise->setWorkout($_REQUEST['idWorkout']);
        $newExercise->setName($_REQUEST['name']);
        $newExercise->setNbSeries("3");
        $newExercise->setRepetitions($_REQUEST['repetition1']."/".$_REQUEST['repetition2']."/".$_REQUEST['repetition3']);

        // Insert the new exercise
        $exerciseService = new ExerciseService();
        $exerciseService->insert($newExercise);

        // Redirect to the view
		return "newWorkout";
	}
}
?>