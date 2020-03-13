<?php
namespace Core;

use Config\DB;
use Core\ModelInterface;

class Model implements ModelInterface
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

    public function getAll()
    {
        $sql = "select * from " . $this->table;

        return $this->db->executeQuery($sql);
    }

    public function getById($id)
    {
        $sql = "select * from " . $this->table . " where " . $this->primaryKey . " = :id";

        return $this->db->executeQuery($sql, compact('id'))[0];
    }

    public function insert($array){
        $sql = "insert into " . $this->table . "(" . implode(",", $this->field) . ") values(:" . implode(",:", $this->field) . ")";
        return $this->db->executeNonQuery($sql, $array);
    }

    public function update($array){
        $fields = array_keys($array);
        $fields = array_diff($fields, ['id', $this->primaryKey]);
        $sqlSet = "";
        foreach ($fields as $value){
            $sqlSet = $sqlSet .  $value . " = :" . $value . ",";
        }
        $sqlSet = substr($sqlSet, 0, strlen($sqlSet) -1);
        $sql = "update " . $this->table . " set " . $sqlSet . " where " . $this->primaryKey . " = :".$this->primaryKey;
        return $this->db->executeNonQuery($sql, $array);
    }

    public function delete($id){
        $sql = "delete from " . $this->table . " where " . $this->primaryKey . " = :id";
        return $this->db->executeNonQuery($sql, compact('id'));
    }

    public function searchByKeyword($fields = array(), $keyword = ''){
        $condition = "";
        foreach ($fields as $field){
            $condition.= $field . " like '%" . $keyword . "%' or ";
        }
        $condition = substr($condition, 0, strlen($condition) -4);
        $sql = "select * from " . $this->table . " where " . $condition;
        return $this->db->executeQuery($sql);
    }

    public function count($conditions= array()){
        $sql_condition = '';
        foreach ($conditions as $condition){
            $sql_condition .= implode(' ', $condition) . ' ';
        }
        $sql_condition = (strlen(trim($sql_condition))) ? ' where ' . $sql_condition : '';
        $sql = "select count(*) as count from " . $this->table . $sql_condition;
        $result = $this->db->executeQuery($sql);
        return (count($result)) ? $result[0]['count'] : '0';
    }
}