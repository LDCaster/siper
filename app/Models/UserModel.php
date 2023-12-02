<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $allowedFields    = [
        'nama',
        'username',
        'password',
        'role_id',
        'email',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

     // ambil semua data table user join dengan table roles
     public function getUsersByRole()
     {
            // Query builder untuk mengambil data user beserta data roles terkait.
            $query = $this->db->table('user')
                ->select('user.id, user.nama, user.username, user.password, roles.nama as role, user.email')
                ->join('roles', 'roles.id = user.role_id')
                ->get();
    
            return $query->getResultArray();
     }

    //  ambil data user berdasarkan username dan join dengan table role
    public function getUserByUsername($username)
    {
        return $this->db->table('user')
            ->select('user.id, user.nama, user.username, user.password, roles.nama as role, user.email')
            ->join('roles', 'roles.id = user.role_id')
            ->where('username', $username)
            ->get()
            ->getRowArray();
    }

}
