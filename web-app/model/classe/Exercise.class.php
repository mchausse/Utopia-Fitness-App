<?php
class Exercise {
    private $id,
            $name,
            $date,
            $nbSeries,
            $repetitions,
            $weight;

    public function getId() {
        return $this->id;
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
    public function getWeight() {
        return $this->weight;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setNbSeries($nbSeries) {
        $this->nbSeries = $nbSeries;
    }
    public function setRepetitions($repetitions) {
        $this->repetitions = $repetitions;
    }
    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function loadFromArray($array){
        $this->id=$array["idExercise"];
        $this->name=$array["name"];
        $this->date=$array["date"];
        $this->nbSeries=$array["nbSeries"];
        $this->repetitions=$array["repetitions"];
        $this->weight=$array["weight"];
    }
    public function loadFromObject($object){
        $this->id=$object->idExercise;
        $this->name=$object->name;
        $this->date=$object->date;
        $this->nbSeries=$object->nbSeries;
        $this->repetitions=$object->repetitions;
        $this->weight=$object->weight;
    }
}
?>