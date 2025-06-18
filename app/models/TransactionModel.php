<?php

class TransactionModel
{
    private $table = 'trans_order';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}
