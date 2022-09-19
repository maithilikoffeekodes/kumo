<?php

namespace App\Models;

use CodeIgniter\Model;


class TestModel extends Model
{
    public function order($id){
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.*,o.created_at as order_date,oi.*,i.*');
        $builder->join('order_item oi', 'o.id = oi.order_id');
        $builder->join('item i', 'i.id = oi.product_id');
        $builder->where('o.id', $id);
        $query = $builder->get();
        $order_detail1 = $query->getResultArray();
        // echo"<pre>";print_r($order_detail1);exit;

        // $order_detail1['order_date'] = $order_detail1['created_at'];
        // if ($order_detail1[0]['default_add'] != 0) {
        //     $db = $this->db;
        //     $builder = $db->table('user u');
        //     $builder->select('u.*,s.sname as state_name,c.cname as city_name');
        //     $builder->join('cities c', 'c.id=u.city');
        //     $builder->join('states s', 's.id=u.state');
        //     $builder->where('u.id', $order_detail1['default_add']);
        //     $builder->where('u.is_delete', 0);
        //     $query = $builder->get();
        //     $order_detail2 = $query->getRowArray();
        // } else {
        //     $db = $this->db;
        //     $builder = $db->table('shipping_address a');
        //     $builder->select('a.*,s.sname as state_name,c.cname as city_name');
        //     $builder->join('cities c', 'c.id=a.city');
        //     $builder->join('states s', 's.id=a.state');
        //     $builder->where('a.id', $order_detail1['ship_id']);
        //     $builder->where('a.is_delete', 0);
        //     $query = $builder->get();
        //     $order_detail2 = $query->getRowArray();
        // }
        // echo"<pre>";print_r($order_detail2);exit;
        $order_detail = array_merge($order_detail1);
        return $order_detail;
    }
    
}