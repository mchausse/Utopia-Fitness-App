<?php
require_once('/model/dao/ExerciseDAO.class.php');

class ExerciseService extends ExerciseDAO {
    
    function insert($exercise) {
        parent::insert($exercise);
    }

    function selectAll() {
        return parent::selectAll();
    }
    
    function selectAllOrderByDateDesc() {
        return parent::selectAllOrderByDateDesc();
    }

    function selectAllExerciseByName($name) {
        // Initiating the connection
		$db = Database::getInstance();
        $request = ExerciseRequest::$SELECTALLEXERCISEBYNAME;
        $preparedRequest = $db->prepare($request);
        $exerciseArray = array();

		try{
            $preparedRequest->execute(array(':name' => $name));
            $exercise=new Exercise();
            // Fetching the data as object
            while ($exerciseResult = $preparedRequest->fetch(PDO::FETCH_OBJ)) {
                $exercise->loadFromObject($exerciseResult);
                array_push($exerciseArray,$exerciseResult);
            }
        } catch(PDOException $error){
            echo $error->getMessage();
        } finally {
            $preparedRequest->closeCursor();
            $db = null;
        }

        return $exerciseArray;
    }

}
?>