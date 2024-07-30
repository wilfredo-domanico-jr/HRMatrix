<?php
namespace App\Models;
use CodeIgniter\Model;

class HalfdayRequestModel extends Model{
 protected $table = 'halfday_request';
 protected $primaryKey = 'REQUEST_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'DATE',
 'TIME',
 'REASON'
 ];

    public function getHalfdayRequestByID($request_id){
            return $this->where('REQUEST_ID', $request_id)
            ->first();
    }

}