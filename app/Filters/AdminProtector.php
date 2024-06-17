<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminProtector implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
{
    // Filter logic before the controller runs
    $session = session();
    $userData = $session->get('userData');

    if (!$session->has("isLoggedIn") || !is_array($userData) || !isset($userData[0]['userRole']) || $userData[0]['userRole'] !== "admin") {
        return redirect()->to('/login')->with('error', 'You must login to continue');
    }
    
}

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Filter logic after the controller runs
    }
}
