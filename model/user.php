<?php
// Objeto Usuario
class User {
    private $id, $name, $email, $user_name, $password, $balance_value;
    // Contrutor do Objeto
    function __construct($name, $email, $user_name, $password, $id = '', $balance_value = 0) {
        $this->name = $name;
        $this->email = $email;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->id = $id;
        $this->balance_value = $balance_value;
    }
    // funcoes publicas get do objeto
    public function getID() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getUser_name() {
        return $this->user_name;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getBalance_value() {
        return $this->balance_value;
    }
    // funcoes publicas set do objeto
    public function setName($name) {
        $this->name = $name;
    }
    public function setEmail($email) {
        $this->email  = $email;
    }
    public function setPassword($password) {
        $this->name = $password;
    }
    public function setBalance_value($balance_value) {
        $this->name = $balance_value;
    }
}