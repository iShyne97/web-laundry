<?php

class UserModel
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT user.*, level.level_name AS level
                            FROM ' .  $this->table .
            ' JOIN level ON user.id_level = level.id
                            ORDER BY user.id DESC');
        return $this->db->resultSet();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM user WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email AND password=:password');
        $this->db->bind('email', $email);
        $this->db->bind('password', sha1($password));
        return $this->db->single();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addUser($data)
    {
        $query = "INSERT INTO user (id_level, name, email, password)
                    VALUES(:id_level, :name, :email, :password)";

        $this->db->query($query);
        $this->db->bind('id_level', $data['id_level']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', sha1($data['password']));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editUser($data)
    {
        $query = "UPDATE user SET
                        id_level = :id_level,
                        name = :name,
                        email = :email,
                        password = :password
                    WHERE id = :id";


        $this->db->query($query);
        $this->db->bind('id_level', $data['id_level']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
