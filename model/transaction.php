<?php
// Objeto Usuario
class Transaction {
    public $id, $description, $type, $value, $classification, $date, $id_user;
    // Contrutor do Objeto
    function __construct($description, $type, $value, $classification, $date, $id_user, $id = '') {
        $this->description = $description;
        $this->type = $type;
        $this->value = $value;
        $this->classification = $classification;
        $this->date = $date;
        $this->id_user = $id_user;
        $this->id = $id;
    }

    public function getDescription() {
        return $this->description;
    }
    public function getType() {
        return $this->type;
    }
    public function getValue() {
        return $this->value;
    }
    public function getClassification() {
        return $this->classification;
    }
    public function getDate() {
        return $this->date;
    }
    public function getId_user() {
        return $this->id_user;
    }
    public function getId() {
        return $this->id;
    }
    
}