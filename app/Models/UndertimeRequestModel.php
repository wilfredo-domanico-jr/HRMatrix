<?php
namespace App\Models;
use CodeIgniter\Model;

class UndertimeRequestModel extends Model{
 protected $table = 'undertime_request';
 protected $primaryKey = 'REQUEST_ID';
 protected $allowedFields = [
 'REQUEST_ID',
 'UT_DATE',
 'REASON'
 ];

    public function getUndertimeRequestByID($request_id){
            return $this->where('REQUEST_ID', $request_id)
            ->first();
    }

}