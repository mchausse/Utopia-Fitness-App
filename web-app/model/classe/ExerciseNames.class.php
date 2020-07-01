<?php
class ExerciseNames {
    private $id,
            $name;
    
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function loadFromArray($array){
        $this->id=$array["id"];
        $this->name=$array["name"];
    }
    public function loadFromObject($object){
        $this->id=$object->id;
        $this->name=$object->name;
    }
}
?>