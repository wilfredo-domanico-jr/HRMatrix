<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class DepartmentController extends BaseController
{
    public function index()
    {
        
        $data=[];
        $model = new DepartmentModel();
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $data['perPage'] = 10;
        $data['total'] = $model->countAll();
        $data['departments'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;
       
      
        return view('admin/departments/index', $data);

    }

    public function create() 
    {
        return view('admin/departments/create');
    }

    public function store()
    {

       
        $model = new DepartmentModel();


         // Check if department id already exist

       $isDepartmentIdExisting = $model->where([
            'DEPT_ID' => $this->request->getVar('departmentID')
        ])->first();

        if($isDepartmentIdExisting){

            session()->setFlashdata('msg', "Department ID `{$this->request->getVar('departmentID')}` already exist");
            session()->setFlashdata('icon', 'error');

            return redirect()->to('/departments/create');
        }

        
        $departmentData = [
            'DEPT_ID' => $this->request->getVar('departmentID'),
            'DEPT_NAME' => $this->request->getVar('department_description')
        ];

        $model->insert($departmentData);

        session()->setFlashdata('msg', 'Department Created Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/departments');

    }

    public function show($departmentId)
    {
        $data=[];
        $model = new DepartmentModel();

        $data['department'] = $model->where('DEPT_ID', $departmentId)->first();

        return view('admin/departments/show',$data);
    }

    public function update($departmentId)
    {
    

        $department = new DepartmentModel();
        
    
        // Update the department
        $updated = $department->where('DEPT_ID', $departmentId)->set([
            'DEPT_NAME' => $this->request->getVar('department_description')
        ])->update();

        if ($updated) {
            // Set a success message
            session()->setFlashdata('msg', 'Department  updated successfully.');
            session()->setFlashdata('icon', 'success');
        } else {
            // Set an error message if the update fails
            session()->setFlashdata('msg', 'Failed to update department. Please try again.');
            session()->setFlashdata('icon', 'error');
        }

     
        

        return redirect()->to('/departments');
    }

    public function delete($departmentId)
    {
     
        $data = new DepartmentModel();
        $data->where('DEPT_ID', $departmentId)
            ->delete();


        session()->setFlashdata('msg', 'Department Deleted Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/departments');
    }
}
