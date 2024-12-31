<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'task';
    protected $primaryKey = 'TASK_ID';
    protected $allowedFields = [
        'TITLE',
        'DESCRIPTION',
        'START_DATE',
        'EMPLOYEE_ID',
        'END_DATE',
        'STATUS'
    ];

    public function getTopFiveEmployee() {

        return $this->join('users', 'users.id = task.EMPLOYEE_ID', 'left')->where('role_id','RL-002')->select(['users.name','department_id'])->limit(5)->findAll();
    }




}
