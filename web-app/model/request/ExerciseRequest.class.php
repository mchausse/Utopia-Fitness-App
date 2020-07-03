<?php
abstract class ExerciseRequest {
    static $INSERT = 'INSERT INTO `exercise` (`idExercise`, `name`, `date`, `nbSeries`, `repetitions`, `weight`) VALUES (:idExercise, :name, NOW(), :nbSeries, :repetitions, :weight)';
    static $SELECTALL = 'SELECT * FROM `exercise`';
    static $SELECTALLORDERBYDATEDESC = 'SELECT * FROM `exercise` ORDER BY date DESC';
}
?>