<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table         = 'users';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name','login','password'];

    public function getUser($login, $password)
{
    // Versión sencilla para la actividad: validar solo por "login"
    return $this->where('login', $login)->first();
}

    //Login function
    //public function getUser($login, $password) {
        //return $this->where(['login' => $login, 'password' => $password])->first();
   // }       
}
