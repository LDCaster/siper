<?php

// app/Filters/StaffMiddleware.php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class StaffMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->to('login');
        }
        $userRole = session('role_id'); // Anda perlu mengganti ini dengan cara Anda mendapatkan informasi peran user.

        // Jika user adalah staff, larang akses ke halaman CMS.
        if ($userRole === 'staff') {
            return redirect()->to('/kesinambungan');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}
