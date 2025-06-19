<?php

class CustomerModel
{
    private $table = 'customer';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllCustomer()
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE deleted_at IS NULL ORDER BY id DESC");
        return $this->db->resultSet();
    }

    public function deleteCustomer($id)
    {
        $date = Helper::generateDateTime();

        $query = "UPDATE {$this->table} set deleted_at = :deleted_at WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('deleted_at', $date);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getCustomerById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addCustomer($data)
    {
        $query = "INSERT INTO {$this->table} (customer_name, phone, address)
                    VALUES(:customer_name, :phone, :address)";

        $this->db->query($query);
        $this->db->bind('customer_name', $data['customer_name']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('address', $data['address']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editCustomer($data)
    {
        $query = "UPDATE {$this->table} SET
                        customer_name = :customer_name,
                        phone = :phone,
                        address = :address
                    WHERE id = :id";


        $this->db->query($query);
        $this->db->bind('customer_name', $data['customer_name']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('address', $data['address']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
