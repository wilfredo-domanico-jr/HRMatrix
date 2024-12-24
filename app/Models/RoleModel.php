<?php
namespace App\Models;
use CodeIgniter\Model;

class RoleModel extends Model{
 protected $table = 'roles';
 protected $primaryKey = 'ROLE_ID';
 protected $allowedFields = [
 'ROLE_ID',
 'ROLE_DESC'
 ];
}