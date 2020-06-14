<?php namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
        
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('Post'));
        }

        $data = [
            'title' => 'Login'
        ];

        return view('auth/login', $data);
    }

    private function isLoggedIn() : bool
    {
        if (session()->get('logged_in')) {
            return true;
            # code...
        }

        return false;
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $credentials = ['email' => $email];

        $user = $this->model
            ->where($credentials)
            ->first();

        if (! $user) {
            session()->setFlashdata('error', 'Email atau password anda salah');
            return redirect()->back();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (! $passwordCheck) {
            session()->setFlashdata('error', 'Email atau password anda salah');
            return redirect()->back();
        }

        $userData = [
            'name' => $user['name'],
            'email' => $user['email'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('post'));
    }
}