<?php

class ServiceModel {
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllService()
    {
        $this->db->query('SELECT * FROM type_of_service ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function deleteService($id)
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

    public function getUserById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}