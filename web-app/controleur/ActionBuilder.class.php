<?php
require_once('./controleur/DefaultAction.class.php');
require_once('./controleur/LoginAction.class.php');
require_once('./controleur/NewWorkoutAction.class.php');
require_once('./controleur/PastWorkoutAction.class.php');
require_once('./controleur/InsertNewExerciseAction.class.php');

class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction){
			case "loginAction" :
				return new LoginAction();
			case "newWorkoutAction" :
				return new NewWorkoutAction();
			case "pastWorkoutAction" :
				return new PastWorkoutAction();
			case "insertNewExerciseAction" :
				return new InsertNewExerciseAction();
			default :
				return new DefaultAction();
		}
	}
}
?>
