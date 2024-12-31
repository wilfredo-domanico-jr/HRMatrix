<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminOrEmployeeFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {


        // links to allow for admin
   
        $adminRoleAccess = [
            'tasks' => ['create','store','delete','update']
        
        ];



        $firstSegments = $request->getUri()->getSegment(1);
        $secondSegments = $request->getUri()->getSegment(2);



        if (isset($adminRoleAccess[$firstSegments]) && in_array($secondSegments, $adminRoleAccess[$firstSegments])) {
            // Access the value
             // Check role ID if admin which is RL-001
            if(session('role_id') != 'RL-001'){

                echo view('errors/html/unathorized-error');
                die();

            }

           
        } 
    
        

      
            
        
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}