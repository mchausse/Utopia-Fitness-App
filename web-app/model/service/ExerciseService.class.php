<?php
require_once('/model/dao/ExerciseDAO.class.php');

class ExerciseService extends ExerciseDAO {
    
    function insert($exercise) {
        parent::insert($exercise);
    }

}
?>