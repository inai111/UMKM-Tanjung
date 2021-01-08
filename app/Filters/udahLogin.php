<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class udahLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->has('username')) {
            if (session()->get('role') != 3) {
                return redirect()->to('/sistem');
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
