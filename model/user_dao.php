<?php
require_once 'db_connect.php';
require_once 'user.php';
require_once 'verify.php';
// Manipulcao de usuario do BD
class UserDao {
    // Insere Usuario na tabela
    public function create(User $user) {
        verifyUser($user->getUser_name());
        $sql = 'INSERT INTO user (name, email, user_name, password) VALUES (?, ?, ?, ?)';
        $password = passwordCrypt($user->getPassword());

        $stmt = Connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $user->getName());
        $stmt->bindValue(2, $user->getEmail());
        $stmt->bindValue(3, $user->getUser_name());
        $stmt->bindValue(4, $password);

        $stmt->execute();
        session_start();
        $_SESSION['message'] =  "Registered";
        header("location: ../index.php");
    }
    // Verifica os Dados de login e redireciona para a pagina certa
    public function login($user_name, $password) {
        $sql = "SELECT id, password From user WHERE user_name ='$user_name'";
        $stmt = Connection::getConn()->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        session_start();
        if($result) {
            if(password_verify($password, $result['password'])){
                $_SESSION['id'] = $result['id'];
                $_SESSION['message'] =  'Login Done';
                header("location: ../view/home.php");
                die;
            } else {
                $_SESSION['message'] =  'Invalid Password';
            }
        } else {
            $_SESSION['message'] =  'Username Not Found';
        }
        header("location: ../");
    }
    // Le os dados de um usuario 
    public function read($id){
        $sql = 'SELECT * FROM user WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // altera informações do usuario
    public function changeData(User $user)
    {
        $sql = 'UPDATE FROM user SET name = ?, email = ?,  WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);

        $stmt->bindValue(1, $user->getName());
        $stmt->bindValue(2, $user->getEmail());
        $stmt->bindValue(3, $user->getId());

        $stmt->execute();
    }
    // deleta usuario
    public function delete($id) {
        $sql = 'DELETE FROM user WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
    // muda a senha de um usuario
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