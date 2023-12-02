<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userId = session('user_id');
        
        if (!$userId) {
            return redirect()->to('/');
        }
        $userRole = session('role_id'); // Anda perlu mengganti ini dengan cara Anda mendapatkan informasi peran user.

        // Jika userrole adalah 'admin','sekretaris', atau 'kasubbag', maka lanjutkan ke halaman yang diminta 
        if ($userRole == 'admin' || $userRole == 'sekretaris' || $userRole == 'kasubbag') {
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Logika yang akan dijalankan setelah eksekusi rute (opsional)
    }
}


