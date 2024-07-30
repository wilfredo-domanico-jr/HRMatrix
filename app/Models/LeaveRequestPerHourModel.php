<?php
namespace App\Models;
use CodeIgniter\Model;

class LeaveRequestPerHourModel extends Model{
 protected $table = 'leave_request_per_hour';
 protected $primaryKey = 'REQUEST_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'LEAVE_TYPE',
 'DATE',
 'FROM',
 'TO',
 'REASON'
 ];

    public function getLeaveRequestPerHourByID($request_id){
            return $this->where('REQUEST_ID', $request_id)
            ->first();
    }

}