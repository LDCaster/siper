<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Menampilkan halaman login
    public function login()
    {
        if (session('user_id')) {
            return redirect()->to('/dashboard');
        }
        return view ('auth/login', ['title' => 'Halaman Login']);
    }

    public function processLogin()
    {
        // Validasi form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
       
        $user = $this->userModel->getUserByUsername($username);

        if($user && password_verify($password, $user['password'])){
            $userData = [
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role_id' => $user['role'],
            ];

            session()->set($userData);
            // dd($userData);

            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }
    }
    

    // Logout
    public function logout()
    {
         // Clear all session data
         session()->destroy();

         // Redirect to the login page
         return redirect()->to('/');
    }
}
