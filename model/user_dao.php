<?php
require_once 'db_connect.php';
require_once 'user.php';
require_once 'password_crypt.php';

class UserDao {
    public function create(User $user) {
        $sql = 'INSERT INTO user (name, email, user_name, password) VALUES (?, ?, ?, ?)';
        $password = passwordCrypt($user->getPassword());

        $stmt = Connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $user->getName());
        $stmt->bindValue(2, $user->getEmail());
        $stmt->bindValue(3, $user->getUser_name());
        $stmt->bindValue(4, $password);

        $stmt->execute();
    }
    public function login($user_name, $password) {
        $sql = "SELECT id, password From user WHERE user_name ='$user_name'";
        $stmt = Connection::getConn()->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        if($result) {
            if(password_verify($password, $result['password'])){
                echo 'Senha Correta!';
                $_SESSION['id'] = $result['id'];
                header("location: ../view/home.php");
                $_SESSION['message'] =  'Login Efetuado';
                die;
            } else {
                $_SESSION['message'] =  'Senha Incorreta!';
            }
        } else {
            $_SESSION['message'] =  'Usuário Não Encontrado!';
        }
        header("location: ../");
    }
    public function read($id){
        $sql = 'SELECT * FROM user WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
        
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function changeData(User $user)
    {
        $sql = 'UPDATE FROM user SET name = ?, email = ?,  WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $user->getName());
        $stmt->bindValue(2, $user->getEmail());
        $stmt->bindValue(3, $user->getId());

        $stmt->execute();
    }
    public function delete($id) {
        $sql = 'DELETE FROM user WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
    public function changePassword($id, $password)
    {
        $sql = 'UPDATE FROM user SET password = ?,  WHERE id = ?';
        $password = passwordCrypt($password);

        $stmt = Connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $password);

        $stmt->execute();
    }
}