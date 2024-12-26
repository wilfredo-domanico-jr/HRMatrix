<?php
namespace App\Models;
use CodeIgniter\Model;

class RequestHeaderModel extends Model{
 protected $table = 'request_header';
 protected $primaryKey = 'REQUEST_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'FORM_TYPE',
 'USER_ID',
 'STATUS',
 'DATE_CREATED'
 ];


 public function getMaxId()
 {
     $query = $this->db->table($this->table)
                 ->selectMax('ID') // Select the maximum value of the id column
                 ->get();

     $row = $query->getRow();
     return $row->ID; // Return the maximum id
 }


   public function getRequestByUser($userID){
      return $this->join('form_type', 'form_type.FORM_ID = request_header.FORM_TYPE', 'left')
      ->where('USER_ID', $userID)
      ->findAll();
   }

   public function isRequestExisting($request_id){
      return $this->where('REQUEST_ID', $request_id)->first();
   }

   public function getRequestByDepartment(){
      return $this->select('departments.DEPT_NAME, COUNT(request_header.REQUEST_ID) as total_count')
      ->join('users', 'users.id = request_header.USER_ID', 'left')
      ->join('departments', 'departments.DEPT_ID = users.department_id', 'left')
      ->groupBy('departments.DEPT_ID')
      ->findAll();
   }



}