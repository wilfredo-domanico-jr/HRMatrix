<?php
namespace App\Models;
use CodeIgniter\Model;

class OvertimeTypeModel extends Model{

 protected $table = 'overtime_type';
 protected $primaryKey = 'TYPE_ID';
 protected $allowedFields = [
    'TYPE_ID',
    'DESCRIPTION'
 ];

}