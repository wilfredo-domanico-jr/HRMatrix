<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class RoleController extends BaseController
{
    public function index()
    {
        $data=[];
        $model = new RoleModel();
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $data['perPage'] = 10;
        $data['total'] = $model->countAll();
        $data['roles'] = $model->paginate($data['perPage']);
        $data['pager'] = $model->pager;
       
      
        return view('admin/roles/index', $data);

    }

    public function create()
    {

        $data=[];

        $departments = new DepartmentModel;
        $roles = new RoleModel;

        $data['departments'] = $departments->findAll();
        $data['roles'] = $roles->findAll();

        return view('admin/roles/create',$data);

    }

    public function store()
    {

      
        $model = new RoleModel();


         // Check if role ID already exist

       $isRoleIDExisting = $model->where([
            'ROLE_ID' => $this->request->getVar('roleID')
        ])->first();

        if($isRoleIDExisting){

            session()->setFlashdata('msg', "Role ID `{$this->request->getVar('roleID')}` alreay exist");
            session()->setFlashdata('icon', 'error');

            return redirect()->to('/roles/create');
        }

      


        $roleData = [
            'ROLE_ID' => $this->request->getVar('roleID'),
            'ROLE_DESC' => $this->request->getVar('role_description'),
        ];

        $model->insert($roleData);

        session()->setFlashdata('msg', 'Role Created Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/roles');

    }

    public function show($userId)
    {
        $data=[];
        $model = new UserModel();

        $data['user'] = $model->where('id', $userId)->first();

        $departments = new DepartmentModel;
        $roles = new RoleModel;

        $data['departments'] = $departments->findAll();
        $data['roles'] = $roles->findAll();



        return view('admin/roles/show',$data);
    }

    public function update($userId)
    {
        


        $model = new UserModel();
        
       
        // Update the user
        $updated = $model->where('id', $userId)->set([
            'department_id' => $this->request->getVar('department'),
            'role_id' => $this->request->getVar('role'),
        ])->update();

        if ($updated) {
            // Set a success message
            session()->setFlashdata('msg', 'User  updated successfully.');
            session()->setFlashdata('icon', 'success');
        } else {
            // Set an error message if the update fails
            session()->setFlashdata('msg', 'Failed to update user. Please try again.');
            session()->setFlashdata('icon', 'error');
        }

     
        

        return redirect()->to('/roles');
    }

    public function delete($roleId)
    {
     
        $data = new RoleModel();
        $data->where('ROLE_ID', $roleId)
            ->delete();


        session()->setFlashdata('msg', 'Role Deleted Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/roles');
    }
}
