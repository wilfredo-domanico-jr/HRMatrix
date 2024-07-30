<?php
namespace App\Models;
use CodeIgniter\Model;

class FormTypeModel extends Model{

 protected $table = 'form_type';
 protected $primaryKey = 'FORM_ID';
 protected $allowedFields = [
    'FORM_ID',
    'FORM_TYPE',
    'FORM_DESCRIPTION'
 ];

}