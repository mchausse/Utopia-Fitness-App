<?php
abstract class ExerciseRequest {
    static $INSERT = 'INSERT INTO `exercise` (`idExercise`, `name`, `date`, `nbSeries`, `repetitions`) VALUES (:idExercise, :name, NOW(), :nbSeries, :repetitions)';
    static $SELECTALL = 'SELECT * FROM `exercise`';
    static $SELECTALLORDERBYDATEASC = 'SELECT * FROM `exercise` ORDER BY date ASC';
}
?>