<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'name',
        'username',
        'password_hash',
    ];
    protected $useTimestamps    = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    public function findByUsername(string $username): ?array
    {
        return $this->where('username', $username)->first();
    }
}

