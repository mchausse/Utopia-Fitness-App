<?php
require_once('/model/classe/Database.class.php');
require_once('/model/classe/Exercise.class.php');
require_once('/model/request/ExerciseRequest.class.php');

class ExerciseDAO extends ExerciseRequest {

    public function insert($exercise){
        // Initiating the connection
		$db = Database::getInstance();
        $request = ExerciseRequest::$INSERTEXERCISE;
        $preparedRequest = $db->prepare($request);
            
        // Assining the values to variables
        $idExercise = null;
        $idWorkout = 1;
        $nameE = "push";
        $nbSeries = 3;
        $repetitions = "push";
    
		try{
            $preparedRequest->execute(array(':idExercise' => $idExercise,
                                            ':idWorkout' => $idWorkout,
                                            ':nameE' => $nameE,
                                            ':nbSeries' => $nbSeries,
                                            ':repetitions' => $repetitions));
        }
		catch(PDOException $error){
            echo $error->getMessage();
        } finally {
            $db = null;
        }
	}
}
?>