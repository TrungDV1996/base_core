<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primary_key = 'id';
    protected $field = ['name', 'email', 'password'];
}