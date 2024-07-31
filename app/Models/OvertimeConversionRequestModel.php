<?php
namespace App\Models;
use CodeIgniter\Model;

class OvertimeConversionRequestModel extends Model{
 protected $table = 'overtime_conversion_request';
 protected $primaryKey = 'OVERTIME_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'OVERTIME_ID',
 'USER_ID',
 'OT_CLASSIFICATION'
 ];

//     public function getLeaveRequestMandatoryByID($request_id){
//             return $this->where('REQUEST_ID', $request_id)
//             ->first();
//     }

}