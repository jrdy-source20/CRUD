<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'email',
        'password',
        'active',
        'is_admin',
        'profile_image',
        'activation_token',
        'reset_token',
        'reset_expires',
        'remember_token'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}