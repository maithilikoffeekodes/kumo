<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class HomeModel extends Model
{
    public function get_randomitem_data()
    {
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.*');
        $builder->orderBy('i.id', 'RANDOM');
        $builder->where('i.is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRanditem = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRanditem;
    }
}
