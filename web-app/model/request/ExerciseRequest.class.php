<?php
abstract class ExerciseRequest {
    protected const INSERTEXERCISE = "INSERT INTO `exercise` (`idExercise`, `idWorkout`, `name`, `date`, `ndSeries`, `repetitions`) VALUES (NULL, ':idWorkout', ':name', NULL, ':ndSeries', ':repetitions')";
}
?>