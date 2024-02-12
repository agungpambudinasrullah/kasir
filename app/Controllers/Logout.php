<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Logout extends BaseController
{
    public function logout()
    {
        return redirect()->to('/v_login');
    }
}
