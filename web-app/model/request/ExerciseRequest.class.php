<?php
abstract class ExerciseRequest {
    static $INSERTEXERCISE = 'INSERT INTO `exercise` (`idExercise`, `idWorkout`, `nameE`, `dateE`, `nbSeries`, `repetitions`) VALUES (:idExercise, :idWorkout, :nameE, NOW(), :nbSeries, :repetitions)';
}
?>