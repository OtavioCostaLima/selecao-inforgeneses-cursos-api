<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $returnType     = 'object';

    protected $allowedFields = ['name', 'first_name', 'last_name', 'email', 'password'];
}