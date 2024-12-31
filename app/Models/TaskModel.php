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

        return $this->join('users', 'users.id = task.EMPLOYEE_ID', 'left')->groupBy('task.EMPLOYEE_ID')->where('role_id','RL-002')->select(['task.EMPLOYEE_ID', 'COUNT(*) AS task_count','users.name','department_id','users.profile'])->limit(5)->orderBy('task_count', 'DESC')->findAll();
    }


    public function countAllPendingTask() {

        return $this->where('STATUS', 0)
        ->countAllResults();
    }

    public function getAllCanceledTask() {

        return $this->join('users', 'users.id = task.EMPLOYEE_ID', 'left')->where('STATUS', 1)
        ->findAll();
    }



}
