<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class SigninController extends Controller
{
    public function index()
    {
        // Check if authenticated
        if(session('isLoggedIn')){
            return redirect()->to('/home');
        }else{
            helper(['form']);
            echo view('layout/guest/header');
            echo view('auth/signin');
            echo view('layout/guest/footer');
        }
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){


                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE,
                    'department' => $data['department_id']
                ];

                $session->set($ses_data);

                return redirect()->to('/home');

            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                $session->setFlashdata('icon', 'error');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            $session->setFlashdata('icon', 'error');
            return redirect()->to('/signin');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}