<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    public function index()
    {

       
       // Check role

       if(session('role_id') == 'RL-001'){

            $data = $this->getAdminData();
            
            return view('task/admin-index',$data);
       }else{
      
            $data = $this->getEmployeeData();
            
        // return view('task/employee-index',$data);
       }

    }

    private function getAdminData(){
        $data = [];

        // Get all Task

        $model = new TaskModel();
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $data['perPage'] = 10;
        $data['total'] = $model->countAll();
        $data['tasks'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;

        return $data;
    }

    private function getEmployeeData(){
        return view('task/employee-index');
    }


    public function create(){

        $data = [];
        $userModel = new UserModel();
        $data['employees'] = $userModel->getAllEmployee();

        return view('task/create',$data);
    }

    public function store(){

        $taskModel = new TaskModel();

       $taskData = [
           'TITLE' => $this->request->getVar('title'),
           'DESCRIPTION' => $this->request->getVar('description'),
           'START_DATE' => $this->request->getVar('start_date'),
           'EMPLOYEE_ID' => $this->request->getVar('employee_id'),
           'END_DATE' => $this->request->getVar('end_date')
       ];

       $taskModel->insert($taskData);

       session()->setFlashdata('msg', 'Task Created Successfully.');
       session()->setFlashdata('icon', 'success');

       return redirect()->to('/tasks');
    }

    public function show($taskNo){

        $data = [];
        $taskModel = new TaskModel();

        $userModel = new UserModel();
        $data['employees'] = $userModel->getAllEmployee();

        $data['task'] =  $taskModel->where('TASK_ID', $taskNo)->first();

        return view('task/show',$data);
    }

    public function update($taksNo)
    {
    

        $taskModel = new TaskModel();
        
    
        // Update the department
        $updated = $taskModel->where('TASK_ID', $taksNo)->set([
            'TITLE' => $this->request->getVar('title'),
            'DESCRIPTION' => $this->request->getVar('description'),
            'START_DATE' => $this->request->getVar('start_date'),
            'EMPLOYEE_ID' => $this->request->getVar('employee_id'),
            'END_DATE' => $this->request->getVar('end_date'),
            'STATUS' => $this->request->getVar('status')
        ])->update();

        if ($updated) {
            // Set a success message
            session()->setFlashdata('msg', 'Task  updated successfully.');
            session()->setFlashdata('icon', 'success');
        } else {
            // Set an error message if the update fails
            session()->setFlashdata('msg', 'Failed to update task. Please try again.');
            session()->setFlashdata('icon', 'error');
        }



        return redirect()->to('/tasks');
    }

    public function delete($taskNo){

        $taskModel = new TaskModel();

        $taskModel->where('TASK_ID', $taskNo)->delete();


        session()->setFlashdata('msg', 'Task Deleted Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/tasks');
    }

  
}
