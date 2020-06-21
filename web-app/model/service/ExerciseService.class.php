<?php
require_once('/model/dao/ExerciseDAO.class.php');

class ExerciseService extends ExerciseDAO {
    
    function insert($exercise) {
        parent::insert($exercise);
    }

    function selectAll() {
        return parent::selectAll();
    }
    
    function selectAllOrderByDateAsc() {
        return parent::selectAllOrderByDateAsc();
    }

}
?>