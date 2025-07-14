<?php

class TransactionDetailModel
{
    private $table = 'trans_order_detail';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addDetailTransaction($data)
    {

        $id_order = $data['order_code'];

        foreach ($data['id_service'] as $i => $id_service) {
            $this->db->query("INSERT INTO {$this->table} (id_order, id_service, qty, sub_total, notes) 
                                VALUES (:id_order, :id_service, :qty, :sub_total, :notes)");
            $this->db->bind('id_order', $id_order);
            $this->db->bind('id_service', $id_service);
            $this->db->bind('qty', $data['qty'][$i]);
            $this->db->bind('sub_total', $data['sub_total'][$i]);
            $this->db->bind('notes', $data['notes'][$i]);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function getDetailTransactionByOrderCode($order_code)
    {
        $this->db->query("SELECT {$this->table}.*, type_of_service.service_name AS service_name
                            FROM {$this->table}
                            JOIN type_of_service ON {$this->table}.id_service = type_of_service.id
                            WHERE id_order = :id_order");
        $this->db->bind('id_order', $order_code);
        return $this->db->resultSet();
    }

    public function addOperatorDetailTransaction($id_order, $items)
    {
        foreach ($items as $item) {
            $this->db->query("INSERT INTO trans_order_detail (id_order, id_service, qty, sub_total) 
                          VALUES (:id_order, :id_service, :qty, :sub_total)");
            $this->db->bind('id_order', $id_order);
            $this->db->bind('id_service', $item['id_service']);
            $this->db->bind('qty', $item['weight']);
            $this->db->bind('sub_total', $item['subtotal']);
            $this->db->execute();
        }
        return true;
    }
}
