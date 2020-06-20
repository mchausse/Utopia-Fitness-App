<?php
abstract class ExerciseRequest {
    static $INSERTEXERCISE = 'INSERT INTO `exercise` (`idExercise`, `name`, `date`, `nbSeries`, `repetitions`) VALUES (:idExercise, :name, NOW(), :nbSeries, :repetitions)';
}
?>