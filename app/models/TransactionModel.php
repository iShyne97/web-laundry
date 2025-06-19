<?php

class TransactionModel
{
    private $table = 'trans_order';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaction()
    {
        $this->db->query("SELECT trans_order.*, customer.customer_name AS cust_name
                                FROM {$this->table}
                                JOIN customer ON trans_order.id_customer = customer.id
                                WHERE trans_order.deleted_at IS NULL
                                ORDER BY order_status = 0 AND trans_order.id DESC;");
        return $this->db->resultSet();
    }

    public function getTransactionById($id)
    {
        $this->db->query("SELECT trans_order.*, customer.customer_name AS cust_name
                                FROM {$this->table}
                                JOIN customer ON trans_order.id_customer = customer.id
                                WHERE trans_order.deleted_at IS NULL AND trans_order.id = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function addTransaction($data)
    {
        $order_code = $data['order_code'];
        $id_customer = $data['id_customer'];
        $order_date = $data['order_date'];
        $order_end_date = $data['order_end_date'];
        $order_pay = $data['order_pay'];
        $order_change = $data['order_change'];
        $total = $data['total'];

        $this->db->query("INSERT INTO {$this->table} (order_code, id_customer, order_date, order_end_date, total, order_pay, order_change) 
                            VALUES (:order_code, :id_customer, :order_date, :order_end_date, :total, :order_pay, :order_change)");
        $this->db->bind('order_code', $order_code);
        $this->db->bind('id_customer', $id_customer);
        $this->db->bind('order_date', $order_date);
        $this->db->bind('order_end_date', $order_end_date);
        $this->db->bind('total', $total);
        $this->db->bind('order_pay', $order_pay);
        $this->db->bind('order_change', $order_change);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteTransaction($id)
    {
        $date = Helper::generateDateTime();

        $query = "UPDATE {$this->table} set deleted_at = :deleted_at WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('deleted_at', $date);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
