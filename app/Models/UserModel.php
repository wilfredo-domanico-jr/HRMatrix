<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
 protected $table = 'users';

 protected $allowedFields = [
 'name',
 'email',
 'password',
 'department',
 'vacation_credits',
 'sickness_credits',
 'created_at'
 ];


public function getUserCredits($user_id)
{
    return $this->where('id', $user_id)->first();
}
}