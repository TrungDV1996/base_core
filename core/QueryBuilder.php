<?php
namespace core;

class QueryBuilder
{

    private $sql;

    public function select($table)
    {
        $this->sql = "SELECT * FROM " . $table;
        return $this;
    }

    public function where($key) {
        $this->sql = "$this->sql WHERE $key = :$key";
        return $this;
    }

    public function limit($offset, $count)
    {
        $this->sql = "$this->sql LIMIT $offset, $count";
    }

    public function whereAnd($params) {
        $this->sql = "$this->sql WHERE ";
        $keys = array_keys($params);
        foreach ($keys as $key) {
            $this->sql .= "$key = :$key" . (next($keys) ? " AND " : "");
        }
        return $this;
    }

    public function insert($table, $params)
    {
        $this->sql  = "INSERT INTO $table";
        $this->sql .= " (`".implode("`, `", array_keys($params))."`)";
        $this->sql .= " VALUES (:".implode(", :", array_keys($params)).") ";
        return $this;
    }

    public function udpate($table, $params)
    {
        $this->sql = "UPDATE $table SET ";
        $keys = array_keys($params);
        foreach ($keys as $key) {
            $this->sql .= "$key = :$key" . (next($keys) ? ", " : "");
        }
        return $this;
    }

    public function delete($table)
    {
        $this->sql = "DELETE FROM " . $table;
        return $this;
    }


    public function sql()
    {
        return $this->sql;
    }
}