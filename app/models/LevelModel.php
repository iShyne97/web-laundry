<?php

class LevelModel
{
    private $table = 'level';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLevel()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}
