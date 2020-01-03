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
    public function read($id){
        $sql = 'SELECT * FROM user WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
        
        return $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update(Produto $p)
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