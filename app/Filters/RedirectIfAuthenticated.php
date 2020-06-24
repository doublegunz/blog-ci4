<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RedirectIfAuthenticated implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $home = site_url('admin/post');

        if (session('logged_in')) {
            return redirect()->to($home);
        }
    }

    public function after(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response)
    {
        
    }
}