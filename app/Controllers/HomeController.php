<?php

namespace App\Controllers;

use App\Models\DepartmentModel;
use App\Models\RequestHeaderModel;
use App\Models\TaskModel;
use App\Models\UserModel;
use DateTime;

class HomeController extends BaseController
{
    public function index()
    {

        $data = [];

        $data['monthYear'] = date('F Y');


        // Get the current month and year
        $now = new DateTime();
        $year = $now->format('Y');
        $month = $now->format('m');

        // Create an array to hold the grouped dates
        $groupedDates = [];


        // Array of day names
        $dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

         // Get the number of days in the current month
         $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

         // Loop through each day of the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            // Create a date string
            $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
            $date = new DateTime($dateString);
            
            // Get the day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
            $dayOfWeek = $date->format('w');
            
         
            // Group dates from Sunday (0) to Saturday (6)
            if ($dayOfWeek >= 0 && $dayOfWeek <= 6) {
                // Use the name of the day as the key
                $groupedDates[$dayNames[$dayOfWeek]][] = $dateString;
            }
        }

 
         // Pass the grouped dates to the view
         $data['groupedDates'] = $groupedDates;


         // Get total Employee
         $userModel = new UserModel();
         $employees = $userModel->countUsersByRole('RL-002');

         $data['employeeCount'] =  $employees;

         // Get total Acive Users
         $activeUsers = $userModel->countActiveUsers();
         $data['activeCount'] =  $activeUsers;
        

          // Get total Department
          $departmentModel = new DepartmentModel();
          $departments = $departmentModel->countAll();
 
          $data['departmentCount'] =  $departments;


          // Get total Request Forms
          $requestModel = new RequestHeaderModel();
          $requests = $requestModel->countAll();
 
          $data['requestCount'] =  $requests;

          $data['requestPerDept'] =  $requestModel->getRequestByDepartment();

          // Get top 5 high performing employee

          $taskModel = new TaskModel();

       
          $data['topFive']  = $taskModel->getTopFiveEmployee();


          // Get 5 employees who are having a birthday this month.
          $data['birthdays']  = $userModel->getEmployeesThatHaveBirthdayThisMonth();


        return view('home',$data);
    }
}
