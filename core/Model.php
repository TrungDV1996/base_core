<?php
namespace Core;

use Config\DB;

class Model
{
    protected $conn = null;
    protected $db = null;
    protected $table = null;
    protected $primaryKey = null;
    protected $field = [];

    public function __construct()
    {
        $this->db = DB::connect();
        $this->conn = $this->db->getConnect();
    }
}