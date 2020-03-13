<?php
namespace Core;

use Config\DB;
use Core\ModelInterface;
use Core\QueryBuilder;
use App\Helpers\Helper;

class Model implements ModelInterface
{
    protected $db = null;
    protected $builder = null;
    protected $table = null;
    protected $primaryKey = null;
    protected $field = [];

    public function __construct()
    {
        $this->db = DB::connect();
        $this->builder = new QueryBuilder;
    }
    public function getAll() {
        $sql = $this->builder->select($this->table)->sql();
        return $this->db->executeQuery($sql);
    }

    public function getById($id) {
        $sql = $this->builder->select($this->table)
            ->where($this->primaryKey)
            ->sql();
        $result = $this->db->executeQuery($sql, compact('id'));

        return !empty($result) ? $result[0] : [];
    }

    public function filter($params) {
        $sql = $this->builder->select($this->table)
            ->whereAnd($params)->sql();
        return $this->db->executeNonQuery($sql, $params);
    }

    public function insert($params) {
        $sql = $this->builder->insert($this->table, $params)->sql();
        return $this->db->executeNonQuery($sql, $params);
    }

    public function update($params) {
        $updateKey = $params;
        unset($updateKey[$this->primaryKey]);
        $sql = $this->builder->udpate($this->table, $updateKey)->where($this->primaryKey)->sql();
        return $this->db->executeNonQuery($sql, $params);
    }

    public function delete($id) {
        $sql = $this->builder->delete($this->table)->where($this->primaryKey)->sql();
        return $this->db->executeNonQuery($sql, compact('id'));
    }
}