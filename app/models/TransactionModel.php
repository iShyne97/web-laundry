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
                                ORDER BY order_status = 1, {$this->table}.id DESC");
        return $this->db->resultSet();
    }

    public function getAllTransactions()
    {
        $this->db->query("SELECT {$this->table}.*, customer.customer_name AS cust_name, customer.phone AS cust_phone, customer.address AS cust_address
                                FROM {$this->table}
                                JOIN customer ON {$this->table}.id_customer = customer.id
                                WHERE {$this->table}.deleted_at IS NULL
                                ORDER BY {$this->table}.id ASC");
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

    public function updateStatus($id, $status = 1)
    {
        $query = "UPDATE trans_order SET
                order_status = :status
              WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('status', $status);
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
        if (!empty($date['start']) && !empty($date['end'])) {
            $query = "SELECT {$this->table}.*, customer.customer_name AS cust_name
                FROM {$this->table}
                JOIN customer ON {$this->table}.id_customer = customer.id
                WHERE {$this->table}.deleted_at IS NULL 
                    AND {$this->table}.order_status = 1 
                    AND order_date BETWEEN :start AND :end
                ORDER BY order_date ASC";

            $this->db->query($query);
            $this->db->bind(':start', $date['start'] . ' 00:00:00');
            $this->db->bind(':end', $date['end'] . ' 23:59:59');
        } else {
            $query = "SELECT {$this->table}.*, customer.customer_name AS cust_name
                FROM {$this->table}
                JOIN customer ON {$this->table}.id_customer = customer.id
                WHERE {$this->table}.deleted_at IS NULL 
                    AND {$this->table}.order_status = 1
                ORDER BY order_date ASC";

            $this->db->query($query);
        }

        return $this->db->resultSet();
    }

    public function getTotalTransaction($date)
    {
        if (!empty($date['start']) && !empty($date['end'])) {
            $query = "SELECT SUM(total) AS total_tr 
                  FROM {$this->table}
                  WHERE deleted_at IS NULL AND order_status = 1 
                    AND order_date BETWEEN :start AND :end";

            $this->db->query($query);
            $this->db->bind(':start', $date['start'] . ' 00:00:00');
            $this->db->bind(':end', $date['end'] . ' 23:59:59');
        } else {
            $query = "SELECT SUM(total) AS total_tr 
                  FROM {$this->table}
                  WHERE deleted_at IS NULL AND order_status = 1";

            $this->db->query($query);
        }

        return $this->db->single();
    }

    public function addOperatorTransaction($data)
    {
        $this->db->query("INSERT INTO trans_order (order_code, id_customer, order_date, order_end_date, total, notes) 
                      VALUES (:order_code, :id_customer, :order_date, :order_end_date, :total, :notes)");
        $this->db->bind('order_code', $data['order_code']);
        $this->db->bind('id_customer', $data['customer']['id']);
        $this->db->bind('order_date', $data['date']);
        $this->db->bind('total', $data['total']);
        $this->db->bind('order_end_date', $data['finish']);
        $this->db->bind('notes', $data['note']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getLastInsertId()
    {
        return $this->db->lastInsertId();
    }


    public function getMonthlyReport($month, $year)
    {
        $this->db->query("
        SELECT 
            s.id AS service_id,
            s.service_name,
            COUNT(tod.id) AS order_count,
            SUM(tod.sub_total) AS total_revenue
        FROM trans_order_detail tod
        JOIN trans_order todr ON tod.id_order = todr.order_code
        JOIN type_of_service s ON tod.id_service = s.id
        WHERE 
            MONTH(todr.order_date) = :month
            AND YEAR(todr.order_date) = :year
            AND todr.deleted_at IS NULL
        GROUP BY s.id, s.service_name
        ORDER BY order_count DESC
    ");
        $this->db->bind('month', $month);
        $this->db->bind('year', $year);
        return $this->db->resultSet();
    }


    public function getTransactionSummary($month, $year)
    {
        $this->db->query("
        SELECT 
            (SELECT COUNT(*) FROM trans_order WHERE deleted_at IS NULL) AS total_all,
            (SELECT COUNT(*) FROM trans_order WHERE MONTH(order_date) = :month AND YEAR(order_date) = :year AND deleted_at IS NULL) AS total_month,
            (SELECT SUM(sub_total) 
             FROM trans_order_detail d
             JOIN trans_order o ON d.id_order = o.order_code
             WHERE MONTH(o.order_date) = :month AND YEAR(o.order_date) = :year AND o.deleted_at IS NULL
            ) AS revenue_month
    ");
        $this->db->bind('month', $month);
        $this->db->bind('year', $year);
        return $this->db->single();
    }

    public function getTodayStats()
    {
        $today = date('Y-m-d');

        // Total transaksi hari ini
        $this->db->query("
        SELECT 
            COUNT(*) AS total_transactions,
            SUM(total) AS total_revenue
        FROM trans_order
        WHERE DATE(order_date) = :today
        AND deleted_at IS NULL
    ");
        $this->db->bind('today', $today);
        $summary = $this->db->single();

        // Transaksi aktif: order_status = 0 dan order_pay IS NULL
        $this->db->query("
        SELECT COUNT(*) AS active_orders
        FROM trans_order
        WHERE DATE(order_date) = :today
        AND order_status = 0
        AND order_pay IS NULL
        AND deleted_at IS NULL
    ");
        $this->db->bind('today', $today);
        $active = $this->db->single();

        // Transaksi selesai: order_status = 1 dan order_pay IS NOT NULL
        $this->db->query("
        SELECT COUNT(*) AS completed_orders
        FROM trans_order
        WHERE DATE(order_date) = :today
        AND order_status = 1
        AND order_pay IS NOT NULL
        AND deleted_at IS NULL
    ");
        $this->db->bind('today', $today);
        $completed = $this->db->single();

        return [
            'total_transactions' => (int) $summary['total_transactions'],
            'total_revenue' => (int) $summary['total_revenue'],
            'active_orders' => (int) $active['active_orders'],
            'completed_orders' => (int) $completed['completed_orders'],
        ];
    }
}
