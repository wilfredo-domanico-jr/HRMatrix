<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'password',
        'department_id',
        'vacation_credits',
        'sickness_credits',
        'role_id',
        'is_active',
        'created_at'
    ];


    public function getUserCredits($user_id)
    {
        return $this->where('id', $user_id)->first();
    }

    public function getAllUserWDepartmentAndRole(){
        return $this->join('departments', 'departments.DEPT_ID = users.department_id', 'left')
        ->join('roles', 'roles.ROLE_ID = users.role_id', 'left');
     }

     public function countUsersByRole($roleId) {
        return $this->where('role_id', $roleId)
                        ->countAllResults();
    }

    public function countActiveUsers() {
        return $this->where('is_active', 1)
                        ->countAllResults();
    }


}
