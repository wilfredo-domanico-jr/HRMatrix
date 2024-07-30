<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DepartmentGuard implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('department'))
        {
            $session = session();
            $session->setFlashdata('msg',  'Cannot create request. User must belong to a department.');
            $session->setFlashdata('icon', 'error');
            return redirect()->to('/request-forms');

        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}