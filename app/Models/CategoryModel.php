<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $allowedFields = ['description'];
}