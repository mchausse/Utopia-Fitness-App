<?php
class Exercise {
    private $id,
            $workout,
            $name,
            $date,
            $nbSeries,
            $repetitions;

    public function getId() {
        return $this->id;
    }
    public function getWorkout() {
        return $this->workout;
    }
    public function getName() {
        return $this->name;
    }
    public function getDate() {
        return $this->date;
    }
    public function getNbSeries() {
        return $this->nbSeries;
    }
    public function getRepetitions() {
        return $this->repetitions;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setWorkout($workout) {
        $this->workout = $workout;
    }
    public function setName($name) {
        $this->workout = $name;
    }
    public function setDate($date) {
        $this->workout = $date;
    }
    public function setNbSeries($nbSeries) {
        $this->workout = $nbSeries;
    }
    public function setRepetitions($repetitions) {
        $this->workout = $repetitions;
    }
    public function loadFromArray($array){
        $this->id=$array["idExercise"];
        $this->workout=$array["idWorkout"];
        $this->name=$array["name"];
        $this->date=$array["date"];
        $this->nbSeries=$array["nbSeries"];
        $this->repetitions=$array["repetitions"];
    }
    public function loadFromObject($object){
        $this->id=$object->id;
        $this->workout=$object->idWorkout;
        $this->name=$object->name;
        $this->date=$object->date;
        $this->nbSeries=$object->nbSeries;
        $this->repetitions=$object->repetitions;
    }
}
?>