<?php namespace App\Controllers;

class LogoutController extends BaseController
{
    public function index()
    {
        $userData = [
            'name',
            'email',
            'logged_in'
        ];

        session()->remove($userData);

        return redirect()->route('login');
    }
}