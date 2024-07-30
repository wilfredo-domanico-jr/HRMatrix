<?php
namespace App\Models;
use CodeIgniter\Model;

class LeaveRequestMandatoryModel extends Model{
 protected $table = 'leave_request_mandatory';
 protected $primaryKey = 'REQUEST_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'LEAVE_TYPE',
 'FROM',
 'TO',
 'REASON'
 ];

    public function getLeaveRequestMandatoryByID($request_id){
            return $this->where('REQUEST_ID', $request_id)
            ->first();
    }

}