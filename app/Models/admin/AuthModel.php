<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class AuthModel extends Model
{
    public function login($post)
    {
        $db = $this->db;
        $builder = $db->table('admin');
        $builder->select('*');
        $builder->where('email', $post['email']);
        $query = $builder->get();
        $result = $query->getRow();
        $msg = array();
        if (!empty($result)) {
            if ($post['password'] == $result->password) {
                $newdata = array(
                    'id' => $result->id,
                    'email' => $result->email,
                );
                $session = session();
                $session->set($newdata);
                $msg = array("st" => "success", "msg" => "Login Successfully!!!");
            } else {
                $msg = array("st" => "failed", "msg" => "Username or Password are Wrong!!!");
            }
            return $msg;
        }
    }
}
