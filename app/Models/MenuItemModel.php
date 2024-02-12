<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model
{
    protected $table      = 'menu_items';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'price', 'image', 'description'];

    public function getImagePath($id)
    {
        $menuItem = $this->find($id);

        if ($menuItem && !empty($menuItem['image'])) {
            return base_url('uploads/' . $menuItem['image']);
        }

        return base_url('uploads/default.jpg');
    }
}
