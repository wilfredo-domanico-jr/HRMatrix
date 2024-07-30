<?php
namespace App\Models;
use CodeIgniter\Model;

class DepartmentModel extends Model{
 protected $table = 'departments';
 protected $primaryKey = 'DEPT_ID';
 protected $allowedFields = [
 'DEPT_ID',
 'DEPT_NAME'
 ];
}