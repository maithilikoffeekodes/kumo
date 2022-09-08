<?php

namespace App\Models;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class HomeModel extends Model
{
    public function insert_edit_data($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array('id' => $post['id']));
        $query = $builder->get();
        $result = $query->getRowArray();

        $pdata = array(
            'first_name' => $post['fname'],
            'last_name' => $post['lname'],
            'email' => $post['email'],
            'password' => $post['password'],
            'mobileno' => $post['mobileno'],
            'address' => $post['address'],
            'state' => $post['state'],
            'city' => $post['city'],
            'pincode' => $post['pincode']
        );
        if (!empty($result)) {
            // print_r($result);exit;
            $builder->where('id', $post['id']);
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Update failed');
            }
            return $msg;
        } else {
            if ($post['password'] == $post['confirm-password']) {
                $res = $builder->insert($pdata);
                if ($res) {
                    $msg = array('st' => 'success', 'msg' => 'Insert successfully');
                } else {
                    $msg = array('st' => 'failed');
                }
                return $msg;
            } else {
                $msg = array('st' => 'wrong password', 'msg' => 'please enter your correct password');
            }
            return $msg;
        }
    }
    public function login($post)
    {
        $db = $this->db;
        $builder = $db->table('user');
        $builder->select('*');
        $builder->where(array('email' => $post['email'], 'is_delete' => '0'));
        $result = $builder->get();
        $result_array = $result->getRow();
        $msg = array();
        if (!empty($result_array)) {
            if ($post['password'] == $result_array->password) {
                $newdata = [
                    'uid' => $result_array->id,
                    'email' => $result_array->email,
                ];
                $session = session();
                $session->set($newdata);
                $msg = array("st" => "success", "msg" => "Login Successfully!!!");
            } else {
                $msg = array("st" => "failed", "msg" => "Username or Password are Wrong!!!");
            }
        }
        return $msg;
    }
  
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
     public function get_product_data($id)
    {
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.*');
        $builder->where('i.id', $id);
        $builder->where('i.is_delete', 0);
        $query = $builder->get();
        $getproduct = $query->getRowArray();
        // echo"<pre>";print_r($getproduct) ;exit;

        $image = array();
        $image[0] = base_url() . $getproduct['image'];

        $image_array = json_decode($getproduct['gallery']);

        if (!empty($image_array)) {
            foreach ($image_array as $row) {
                $image[] = $row->h_path . @$row->t_path . @$row->image_name;
            }
        }
        $getproduct['image'] = $image;
        // echo"<pre>";print_r($getproduct['image']) ;exit;
        return $getproduct;
    }
    public function get_randomslider_data()
    {
        $db = $this->db;
        $builder = $db->table('slider');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRandslider = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRandslider;
    }
    public function insert_cart_data($post)
    {
        // echo "<pre>";print_r($post);exit;                                                                         
        $db = $this->db;
        $builder = $db->table("cart");
        $builder->select('*');
        $builder->where(array('product_id' => $post['product_id'], 'is_delete' => 0));
        $query =  $builder->get();
        $result = $query->getRowArray();
        // echo "<pre>";print_r($result);exit;
        $pdata = array(
            'user_id' =>  '',
            'product_id' => $post['product_id'],
            'quantity' => $post['quantity'],
            'date' => date('y-m-d'),
            'price' => $post['price']
        );

        if(!empty($result)){
            $pdata['updated_at'] = date('Y-m-d H:i:s');
            $pdata['updated_by'] = '';
    
            $builder->where(array( 'product_id' => $post['product_id']));
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'added', 'msg' => 'Item Update to Cart');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Failed Update to Cart');
            }
        }
       else{
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = '';

        $res = $builder->insert($pdata);
        if ($res) {
            $msg = array('st' => 'success', "msg" => "Item Added to Cart");
        } else {
            $msg = array('st' => 'failed', "msg" => "Failed to Cart");
        }
       }
        
        return $msg;
    }
    public function get_states($post)
    {
        echo"<pre>";print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('states');
        $builder->select('id,sname');
        $builder->like('sname', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $builder->limit(50);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // echo"<pre>";print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['sname'],
                "id" => $row['id'],
            );
        }

        return $result;
    }
    public function get_city($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('cities');
        $builder->select('id,cname');
        $builder->where(array('state_id' => $post['state_id']));
        $builder->like('cname', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $query = $builder->get();
        $getdata = $query->getResultArray();

        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['cname'],
                "id" => $row['id'],
            );
        }

        return $result;
    }
}
