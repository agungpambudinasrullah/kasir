<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MenuController extends BaseController
{
    public function index()
    {
        $menuItemModel = new MenuItemModel();
        $data['menuItems'] = $menuItemModel->findAll();

        return view('menu_view', $data);
    }

    public function order()
    {
        // Handle order submission, update database, etc.
        // This is a placeholder for demonstration purposes.
        return redirect()->to('/');
    }
}
