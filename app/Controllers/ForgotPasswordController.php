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

        $to = $submittedEmail;
        $subject = "Password Reset Link";
        $message= "You have received a password reset link. Click to change your password";//Write the message you want to send

        $email = \Config\Services::email();

        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.gmail.com', // Use your SMTP server
            'SMTPPort' => 587, // Common SMTP port for TLS
            'SMTPUser ' => 'wiis5upport@gmail.com', // Your email address
            'SMTPPass' => 'ftarudbubexcspgv', // Your email password
            'mailType' => 'html', // or 'text'
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'SMTPCrypto' => 'tls', // Use 'ssl' if your SMTP server requires it
        ];

            $email->initialize($config);
            $email->setFrom('wiis5upport@gmail.com', 'Mail Testing');
            $email->setTo($submittedEmail);
            $email->setSubject('Password Reset Link');
            $email->setMessage('You have received a password reset link. Click to change your password');


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