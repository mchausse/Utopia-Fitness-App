<?php
require_once('./controleur/Action.interface.php');
include('/service/ExerciseService.class.php');
class InsertNewExerciseAction implements Action {
	public function execute(){
		if (!ISSET($_SESSION)) { 
            session_start();
        }
		if (!ISSET($_SESSION["connected"])) {
            return "login";
        }
        // Treat the incoming informations
        $_REQUEST['repetition'] = $_REQUEST['repetition1'].$_REQUEST['repetition2'].$_REQUEST['repetition3'];
        // Insert the new exercise
        $exerciseService = new ExerciseService();
        $exerciseService.insert($_REQUEST['idWorkout'],
                                $_REQUEST['name'],
                                $_REQUEST['nbSeries'],
                                $_REQUEST['repetition']);
        // Redirect to the view
		return "newWorkout";
	}
}
?>