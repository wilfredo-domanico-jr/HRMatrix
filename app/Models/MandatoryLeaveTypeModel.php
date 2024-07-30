<?php
namespace App\Models;
use CodeIgniter\Model;

class MandatoryLeaveTypeModel extends Model{

 protected $table = 'mandatory_leave_type';
 protected $primaryKey = 'TYPE_ID';
 protected $allowedFields = [
    'TYPE_ID',
    'DESCRIPTION'
 ];

}