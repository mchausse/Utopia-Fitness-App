<?php
require_once('/model/dao/ExerciseNamesDAO.class.php');

class ExerciseNamesService extends ExerciseNamesDAO {

    function selectAll() {
        return parent::selectAll();
    }

}
?>