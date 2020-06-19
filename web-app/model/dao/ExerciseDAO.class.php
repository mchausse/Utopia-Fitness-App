<?php
include('/classe/Database.class.php');
include('/classe/Exercise.class.php');
include('/request/ExerciseRequest.class.php');

class ExerciseDAO extends ExerciseRequest{

    public function insert($exercise){
		$db = Database::getInstance();
        $request = ExerciseRequest::INSERTEXERCISE;
        $preparedRequest = $db->prepare($request);
        $preparedRequest->execute(array(':idWorkout'->$exercise->workout, 
                                        ':name'->$exercise->name, 
                                        ':nbSeries'->$exercise->nbSeries, 
                                        ':repetition'->$exercise->repetition));
		try{
            return $db->exec($request);
        }
		catch(PDOException $error){
            return $error;
        }
	}
}
?>