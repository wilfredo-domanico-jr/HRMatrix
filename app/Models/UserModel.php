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
        'department',
        'vacation_credits',
        'sickness_credits',
        'created_at',
        'role_id'
    ];


    public function getUserCredits($user_id)
    {
        return $this->where('id', $user_id)->first();
    }

    public function getAllUserWDepartmentAndRole(){
        return $this->join('departments', 'departments.DEPT_ID = users.department_id', 'left')
        ->join('roles', 'roles.ROLE_ID = users.role_id', 'left');
     }


}
