<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ForgotPasswordController extends Controller
{
    public function index()
    {
       return view('auth/forgot-password');
    }

    public function submit()
    {
        $session = session();

        // Check is Email Exist

        $model = new UserModel();
        $submittedEmail = $this->request->getVar('email');
        $isEmailExisting = $model->where('email',$submittedEmail)->first();

        if(!$isEmailExisting){
            $session->setFlashdata('msg', 'Email does not exist.');
            $session->setFlashdata('icon', 'error');

            return redirect()->to('/forgot-password');
        }

        // Send an email

        $subject = "Password Reset Link";
        $message= "You have received a password reset link. Click to change your password";//Write the message you want to send

        $email = \Config\Services::email();


        $config = [
            'protocol' => env('protocol'),
            'SMTPHost' => env('SMTPHost'),
            'SMTPPort' => (int) env('SMTPPort'), 
            'SMTPUser ' => env('SMTPUser'), 
            'SMTPPass' => env('SMTPPass'),
            'mailType' => env('mailType'), 
            'charset' => env('charset'),
            'newline' => env('newline'),
            'SMTPCrypto' => env('SMTPCrypto'), 
        ];

            $email->initialize($config);
            $email->setFrom(env('SMTPUser'), 'Forgot Password');
            $email->setTo($submittedEmail);
            $email->setSubject($subject);
            $email->setMessage($message);


        if($email->send())
            {
                $session->setFlashdata('msg', "We have successfully send a password reset link to `$submittedEmail`.");
                $session->setFlashdata('icon', 'success');
        
                return redirect()->to('/');
            }
            else {
            
                // Set flashdata with the error message
                $session->setFlashdata('msg', "Unable to send email to `$submittedEmail`. Please try again.");
                $session->setFlashdata('icon', 'error');
            
                return redirect()->to('/forgot-password');
            }

    }

    
}