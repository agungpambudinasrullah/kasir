<?php

namespace App\Controllers;

use App\Models\MenuItemModel;
use CodeIgniter\Controller;

class HomeController extends Controller
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
