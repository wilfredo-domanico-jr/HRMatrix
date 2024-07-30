<?php
namespace App\Models;
use CodeIgniter\Model;

class UserOvertimeModel extends Model{
 protected $table = 'user_overtime';

 protected $allowedFields = [
 'USER_ID',
 'DATE',
 'HOURS',
 'MINUTES',
 'OVERTIME_TYPE'
 ];


    public function getUserOrdinaryWorkingDayOvertime($user_id)
    {
        return $this->where([
            'USER_ID' => $user_id,
            'OVERTIME_TYPE' => 'OT-001'
        ])->findAll();
    }

    public function getUserRestDayOvertime($user_id)
    {
        return $this->where([
            'USER_ID' => $user_id,
            'OVERTIME_TYPE' => 'OT-002'
        ])->orWhere([
            'OVERTIME_TYPE' => 'OT-003'
        ])->findAll();
    }


    public function getUserSpecialOvertime($user_id)
    {
        return $this->where([
            'USER_ID' => $user_id,
            'OVERTIME_TYPE' => 'OT-004'
        ])->findAll();
    }


}