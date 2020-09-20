<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $allowedFields = ['title', 'description', 'url_image', 'price', 'cotegory_id'];
}