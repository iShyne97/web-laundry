<?php
class PickupModel
{
    private $table = 'trans_laundry_pickup';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function addPickup($data)
    {
        $id_order = $data['id_order'];
        $id_customer = $data['id_customer'];
        $pickup_date = Helper::generateDate();
        $notes = $data['notes'];
        $this->db->query("INSERT INTO {$this->table} (id_order, id_customer, pickup_date, notes) 
                            VALUES (:id_order, :id_customer, :pickup_date, :notes)");
        $this->db->bind('id_order', $id_order);
        $this->db->bind('id_customer', $id_customer);
        $this->db->bind('pickup_date', $pickup_date);
        $this->db->bind('notes', $notes);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
