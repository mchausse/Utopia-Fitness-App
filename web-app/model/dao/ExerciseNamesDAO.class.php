<?php
require_once('/model/classe/Database.class.php');
require_once('/model/classe/ExerciseNames.class.php');
require_once('/model/request/ExerciseNamesRequest.class.php');
class ExerciseNamesDAO extends ExerciseNamesRequest {

    public function selectAll() {
        // Initiating the connection
		$db = Database::getInstance();
        $request = ExerciseNamesRequest::$SELECTALL;

        // Fetching the data
		try{
            $result = $db->query($request);
        } catch(PDOException $error){
            echo $error->getMessage();
        } finally {
            $db = null;
        }

        // Treating the values
        $exerciseNamesArray = array();
        foreach($result as $exerciseNamesResult) {
            $exerciseNames=new ExerciseNames();
            $exerciseNames->loadFromArray($exerciseNamesResult);
            array_push($exerciseNamesArray,$exerciseNames);
        }
        return $exerciseNamesArray;
    }
}
?>