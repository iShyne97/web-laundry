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
        $this->db->query("SELECT {$this->table}.*, customer.customer_name AS cust_name, customer.phone AS cust_phone, customer.address AS cust_address
                                FROM {$this->table}
                                JOIN customer ON {$this->table}.id_customer = customer.id
                                WHERE {$this->table}.deleted_at IS NULL
                                ORDER BY order_status = 0, {$this->table}.id DESC");
        return $this->db->resultSet();
    }

    public function getTransactionById($id)
    {
        $this->db->query("SELECT trans_order.*, customer.customer_name AS cust_name, customer.phone AS cust_phone, customer.address AS cust_address
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
        $order_date = Helper::generateDate();
        $order_end_date = $data['order_end_date'];
        $order_pay = isset($data['order_pay']) && $data['order_pay'] !== '' ? $data['order_pay'] : null;
        $order_change = isset($data['order_change']) && $data['order_change'] !== '' ? $data['order_change'] : null;
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

    public function updateStatus($id)
    {
        $query = "UPDATE trans_order SET
                        order_status = 1
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatePayment($data)
    {
        $query = "UPDATE trans_order SET
                        order_pay = :order_pay,
                        order_change = :order_change
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('order_pay', $data['order_pay']);
        $this->db->bind('order_change', $data['order_change']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getTransactionByStatusAndDate($date)
    {
        if ($date) {
            $query = "SELECT {$this->table}.*, customer.customer_name AS cust_name
                    FROM {$this->table}
                    JOIN customer ON {$this->table}.id_customer = customer.id
                    WHERE {$this->table}.deleted_at IS NULL AND {$this->table}.order_status = 1 AND order_date BETWEEN :start AND :end 
                    ORDER BY order_date ASC";
            $this->db->query($query);
            $this->db->bind(':start', $date['start']);
            $this->db->bind(':end', $date['end']);
        } else {
            $query = "SELECT {$this->table}.*, customer.customer_name AS cust_name
                                FROM {$this->table}
                                JOIN customer ON {$this->table}.id_customer = customer.id
                                WHERE {$this->table}.deleted_at IS NULL AND {$this->table}.order_status = 1
                                ORDER BY {$this->table}.id DESC";
            $this->db->query($query);
        }
        return $this->db->resultSet();
    }

    public function getTotalTransaction($date = null)
    {
        if ($date) {
            $query = "SELECT SUM(total) AS total_tr 
                        FROM {$this->table}
                        WHERE {$this->table}.deleted_at IS NULL AND {$this->table}.order_status = 1 AND order_date BETWEEN :start AND :end ";
            $this->db->query($query);
            $this->db->bind(':start', $date['start']);
            $this->db->bind(':end', $date['end']);
        } else {
            $query = "SELECT SUM(total) AS total_tr 
                        FROM {$this->table}
                        WHERE {$this->table}.deleted_at IS NULL AND {$this->table}.order_status = 1";
            $this->db->query($query);
        }
        return $this->db->single();
    }
}
