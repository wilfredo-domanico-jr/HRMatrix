<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {
        $data=[];
        $model = new UserModel;
        $data['page'] = isset($_GET['page']) ? $_GET['page'] : 1;
        $data['perPage'] = 10;
        $data['total'] = $model->countAll();
        $data['users'] = $model->getAllUserWDepartmentAndRole()->paginate($data['perPage']);
        $data['pager'] = $model->pager;
       
      
        return view('admin/users/index', $data);

    }

    public function create()
    {

        $data=[];

        $departments = new DepartmentModel;
        $roles = new RoleModel;

        $data['departments'] = $departments->findAll();
        $data['roles'] = $roles->findAll();

        return view('admin/users/create',$data);

    }

    public function store()
    {

       
        $model = new UserModel();


         // Check if email already exist

       $isEmailExisting = $model->where([
            'email' => $this->request->getVar('email')
        ])->first();

        if($isEmailExisting){

            session()->setFlashdata('msg', "Email `{$this->request->getVar('email')}` alreay exist");
            session()->setFlashdata('icon', 'error');

            return redirect()->to('/users/create');
        }

        // Check if Inital password match

        $isInitialPassMatched = $this->request->getVar('initial_password') == $this->request->getVar('initial_password_confirmation');
        
        if(!$isInitialPassMatched){
            session()->setFlashdata('msg', 'Inital Password and Initial Password Confirmation not matched.');
            session()->setFlashdata('icon', 'error');

            return redirect()->to('/users/create');
        }
        

        $userData = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('initial_password'), PASSWORD_DEFAULT),
            'department_id' => $this->request->getVar('department'),
            'role_id'=> $this->request->getVar('role'),
        ];

        $model->insert($userData);

        session()->setFlashdata('msg', 'User Created Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/users');

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



        return view('admin/users/show',$data);
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

     
        

        return redirect()->to('/users');
    }

    public function delete($userId)
    {
     
        $data = new UserModel();
        $data->where('id', $userId)
            ->delete();


        session()->setFlashdata('msg', 'User Deleted Successfully.');
        session()->setFlashdata('icon', 'success');

        return redirect()->to('/users');
    }
}
