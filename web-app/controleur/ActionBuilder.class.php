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
				break;
			case "newWorkoutAction" :
				return new NewWorkoutAction();
				break;
			case "pastWorkoutAction" :
				return new PastWorkoutAction();
				break;
			case "insertNewExerciseAction" :
				return new InsertNewExerciseAction();
				break;
			default :
				return new DefaultAction();
		}
	}
}
?>
