<?php
abstract class ExerciseRequest {
    static $INSERT = 'INSERT INTO `exercise` (`idExercise`, `name`, `date`, `nbSeries`, `repetitions`, `weight`) VALUES (:idExercise, :name, NOW(), :nbSeries, :repetitions, :weight)';
    static $SELECTALL = 'SELECT * FROM `exercise`';
    static $SELECTALLORDERBYDATEDESC = 'SELECT * FROM `exercise` ORDER BY date DESC';
    static $SELECTALLEXERCISEBYNAME = 'SELECT `idExercise`, `name`, `date`, `nbSeries`, `repetitions`, `weight` FROM `exercise` WHERE name = :name ORDER BY date ASC';
}
?>