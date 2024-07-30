<?php
namespace App\Models;
use CodeIgniter\Model;

class OvertimeRequestModel extends Model{
 protected $table = 'overtime_request';
 protected $primaryKey = 'REQUEST_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'OT_DATE',
 'OT_TYPE',
 'HOUR',
 'MINUTE',
 'PURPOSE'
 ];


        public function getOvertimeRequestByID($request_id){
            return $this->where('REQUEST_ID', $request_id)
            ->first();
         }

}