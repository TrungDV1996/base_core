<?php
namespace Core;

interface ModelInterface{
    public function getAll();
    public function getById($id);
    public function update($array);
    public function delete($id);
    public function searchByKeyword($fields = array(), $keyword = '');
    public function count($conditions= array());
}