<?php
namespace Core;

interface ModelInterface{
    public function getAll();
    public function getById($id);
    public function filter($params);
    public function insert($params);
    public function update($params);
    public function delete($id);
}