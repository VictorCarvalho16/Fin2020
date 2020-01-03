<?php

class User {
    private $id, $name, $email, $user_name, $password;
    
    function __construct($name, $email, $user_name, $password, $id = '') {
        $this->name = $name;
        $this->email = $email;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->id = $id;
    }

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

    public function setName($name) {
        $this->name = $name;
    }
    public function setEmail($email) {
        $this->email  = $email;
    }
    public function setPassword($password) {
        $this->name = $password;
    }
}