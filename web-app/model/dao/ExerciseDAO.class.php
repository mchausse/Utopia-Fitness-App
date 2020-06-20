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
        $name = $exercise->getName();
        $nbSeries = $exercise->getNbSeries();
        $repetitions = $exercise->getRepetitions();
    
		try{
            $preparedRequest->execute(array(':idExercise' => $idExercise,
                                            ':name' => $name,
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