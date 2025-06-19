<?php

class ServiceModel
{
    private $table = 'type_of_service';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllService()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE deleted_at IS NULL ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function deleteService($id)
    {
        $date = Helper::generateDateTime();

        $query = "UPDATE {$this->table} set deleted_at = :deleted_at WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('deleted_at', $date);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getServiceById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addService($data)
    {
        $query = "INSERT INTO {$this->table} (service_name, price, description)
                    VALUES(:service_name, :price, :description)";

        $this->db->query($query);
        $this->db->bind('service_name', $data['service_name']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('description', $data['description']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editService($data)
    {
        $query = "UPDATE {$this->table} SET
                        service_name = :service_name,
                        price = :price,
                        description = :description
                    WHERE id = :id";


        $this->db->query($query);
        $this->db->bind('service_name', $data['service_name']);
        $this->db->bind('price', $data['price']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
