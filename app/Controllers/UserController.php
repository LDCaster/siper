<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RolesModel;

class UserController extends BaseController
{

    protected $userModel;
    protected $rolesModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->rolesModel = new RolesModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->getUsersByRole();
        return view('user/index', $data);
       
    }

    public function create()
    {

        $roles = $this->rolesModel->findAll();

        $data = [
            'role' => $roles,
            'validation' => \Config\Services::validation(),
        ];
        
        return view('user/create', $data);
    }

    public function store()
    {
        // Validasi input
        $validationRules = [
            'nama' => 'required',
            'username' => 'required|is_unique[user.username]',
            'password' => 'required',
            'role_id' => 'required',
            'email' => 'required|valid_email|is_unique[user.email]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to('/user/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new userModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id' => $this->request->getPost('role_id'),
            'email' => $this->request->getPost('email'),
        ];
        $userModel->insert($data);

        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        $roles = $this->rolesModel->findAll();

        if (!$user) {
            return redirect()->to('/user')->with('error', 'User not found');
        }

        $data = [
            'user' => $user,
            'roles' => $roles,
            'validation' => \Config\Services::validation(),
        ];

        return view('user/edit', $data);
    }

    public function update($id)
    {

        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/user')->with('error', 'User not found');
        }

        // Validasi input
        $validationRules = [
            'nama' => 'required',
            'username' => "required|is_unique[user.username,id,$id]",
            'role_id' => 'required',
            'email' => "required|valid_email|is_unique[user.email,id,$id]",
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->to("/user/edit/$id")->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $password = $this->request->getPost('password');

        // Validasi apakah password adalah string dan tidak kosong
        if (is_string($password) && !empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash password menggunakan bcrypt
        } else {
            // Handle kesalahan jika password tidak sesuai
            echo "Password tidak valid.";
            return;
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'role_id' => $this->request->getPost('role_id'),
            'email' => $this->request->getPost('email'),
        ];

        // Perbarui kata sandi jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to('/user')->with('error', 'User not found');
        }

        $this->userModel->delete($id);

        session()->setFlashdata('success', 'User deleted successfully');

        return redirect()->to('/user');
    }
}
