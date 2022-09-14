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
        $builder->select('i.*,b.brand as brand_name,c.category as category_name');
        $builder->join('brand b', 'b.id=i.brand');
        $builder->join('category c', 'c.id=i.category');
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
        $builder->select('i.*,b.brand as brand_name,c.category as category_name');
        $builder->join('brand b', 'b.id=i.brand');
        $builder->join('category c', 'c.id=i.category');
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
    public function get_randombrand_data()
    {
        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRandBrand = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRandBrand;
    }
    public function get_randomcategory_data()
    {
        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('*');
        $builder->orderBy('id', 'desc');
        $builder->where('is_delete', '0');
        // $builder->limit(8);
        $query = $builder->get();
        $getRandCatergory = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRandCatergory;
    }
    public function insert_cart_data($post)
    {
        // echo "<pre>";print_r($post);exit;                                                                         
        $db = $this->db;
        $builder = $db->table("cart");
        $builder->select('*');
        $builder->where(array('user_id' => session('uid') ? session('uid') : session('guestid'), 'product_id' => $post['product_id'], 'is_delete' => 0));
        $query =  $builder->get();
        $result = $query->getRowArray();
        // echo "<pre>";print_r($result);exit;
        $pdata = array(
            'user_id' =>  session('uid') ? session('uid') : session('guestid'),
            'product_id' => $post['product_id'],
            'quantity' => $post['quantity'],
            'date' => date('y-m-d'),
            'price' => $post['price']
        );

        if (!empty($result)) {
            // $pdata['updated_at'] = date('Y-m-d H:i:s');
            // $pdata['updated_by'] = session('uid') ? session('uid') : session('guestid');

            $builder->where(array('product_id' => $post['product_id']));
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'added', 'msg' => 'Item Update to Cart');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Failed Update to Cart');
            }
        } else {
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = session('uid') ? session('uid') : session('guestid');

            $res = $builder->insert($pdata);
            if ($res) {
                $msg = array('st' => 'success', "msg" => "Item Added to Cart");
            } else {
                $msg = array('st' => 'failed', "msg" => "Failed to Cart");
            }
        }

        return $msg;
    }
    public function get_cart_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.name,c.price,c.quantity');
        $builder->join('item i', 'i.id = c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('uid') ? session('uid') : session('guestid'));
        $query =  $builder->get();
        $result = $query->getResultArray();
        return $result;
    }

    public function update_cart_data($post)
    {
        // echo"<pre>";print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('cart');
        $qty = $post['qty'];
        // $id = $post['id'];

        for ($i = 0; $i < count($qty); $i++) {
            $pdata = array(
                'quantity' => $qty[$i]
            );

            $builder->where('user_id', session('uid') ? session('uid') : session('guestid'));
            $pdata['update_at'] = date('Y-m-d H:i:s');
            $pdata['update_by'] = session('uid') ? session('uid') : session('guestid');
            $builder->update($pdata);
        }
        $msg = array('st' => 'success');
        return $msg;
    }
    public function get_cartupdate_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.name,i.price,c.quantity,c.product_id');
        $builder->join('item i', 'i.id=c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('uid') ? session('uid') : session('guestid'));
        $data_table = DataTable::of($builder);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="130" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {

            $btnquantity = '
            <div class="qty_class" style="width:110px;">
            <button class="btn btn-sm btn-secondary btn-minus decrement" type="button" onclick="decrement(this)">
            <i class="fa fa-minus" style="margin-right:1px;"></i></button>
            <span class="count" style="margin-left:5px;margin-right:5px;">' . $row->quantity . '</span>
            <input type="hidden" class="form-control qty" name="qty[]" value="' . $row->quantity . '">
            <input type="hidden" class="form-control qty" name="cart_id[]" value="' . $row->id . '">
            <input type="text" class="form-control price_hidden d-none" name="price[]" value="' . $row->price . '">
            <button class="btn btn-sm btn-secondary btn-plus increment" type="button" onclick="increment(this)">
            <i class="fa fa-plus"></i></button>
            </div>';

            return $btnquantity;
        });

        $data_table->add('action', function () {
            $btntotal = '<input type="text" class="total text-center" name="sub[]" readonly style="border:none;color:#6F6F6F;">';
            return $btntotal;
        });
        $data_table->add('action', function ($row) {
            $btndelete = '<a  title="Cart name: ' . $row->name . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="fas fa-trash-alt" style="color:grey"></i></a> ';
            return $btndelete;
        }, 'last')

            ->hide('product_id')
            ->hide('id')
            ->hide('quantity');


        return $data_table->toJSON();
    }
    public function get_finalcart_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.name,i.price,c.quantity,c.product_id');
        $builder->join('item i', 'i.id=c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('uid') ? session('uid') : session('guestid'));
        $data_table = DataTable::of($builder);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="130" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {

            $btnquantity = '
      <div class="qty_class">
      <span class="count">' . $row->quantity . '</span>
      <input type="hidden" class="form-control qty" name="qty[]" value="' . $row->quantity . '">
      <input type="hidden" class="form-control qty" name="cart_id[]" value="' . $row->product_id . '">
      <input type="text" class="form-control price_hidden d-none" name="price[]" value="' . $row->price . '">
      </div>';

            return $btnquantity;
        });

        $data_table->add('action', function () {
            $btntotal = '<input type="text" class="total text-center" name="sub[]" readonly style="border:none;color:#6F6F6F;">';
            return $btntotal;
        })
            ->hide('product_id')
            ->hide('id')
            ->hide('quantity');


        return $data_table->toJSON();
    }

    public function get_order_data()
    {
        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.id,o.user_id,o.created_at,o.total_payment,o.transaction_id,o.payment_type,o.transaction_status');
        $builder->where('user_id', session('id'));
        // $builder->where('o.is_delete', '0');
        $data_table = DataTable::of($builder);
        $data_table->setSearchableColumns(['id']);
        $data_table->add('action', function ($row) {
            $btnview = '<a href="' . url('Home/orderview/') . $row->id . '"  class="btn btn-link pd-10"><i class="far fa-eye"></i></a> ';
            return $btnview;
        });
        return $data_table->toJSON();
    }
    public function get_data($id)
    {
        $db = $this->db;
        $builder = $db->table('orders o');
        $builder->select('o.*');
        $builder->where('o.id', $id);
        // $builder->where('o.is_delete', 0);
        $query = $builder->get();
        $result = $query->getRowArray();
        // if ($result['ship_id'] != 0) {
        //     $db = $this->db;
        //     $builder = $db->table('signup u');
        //     $builder->select('u.*,s.sname as state_name,c.cname as city_name');
        //     $builder->join('cities c', 'c.id=u.city');
        //     $builder->join('states s', 's.id=u.state');
        //     $builder->where('u.id', $result2['default_add']);
        //     $builder->where('u.is_delete', 0);
        //     $query = $builder->get();
        //     $result1 = $query->getRowArray();
        // // } else {
        //     $db = $this->db;
        //     $builder = $db->table('address a');
        //     $builder->select('a.*,s.sname as state_name,c.cname as city_name');
        //     $builder->join('cities c', 'c.id=a.city');
        //     $builder->join('states s', 's.id=a.state');
        //     $builder->where('a.id', $result['ship_id']);
        //     $builder->where('a.is_delete', 0);
        //     $query = $builder->get();
        //     $result = $query->getRowArray();
        // }
        // $result = array_merge($result1, $result2);
        // // echo"<pre>";print_r($result);exit;

        return $result;
    }

    public function get_orderviewdata($get)
    {

        //  print_r('dsvsdvf');exit;
        $db = $this->db;
        $builder = $db->table('order_item oi');
        $builder->select('i.image,i.name,oi.price,oi.quantity,oi.total');
        $builder->join('item i', 'i.id=oi.product_id');

        $builder->where('oi.order_id', $get);
        $builder->where('oi.is_delete', '0');
        $data_table = DataTable::of($builder);
        //  print_r('rfvrvrgv');exit;
        $data_table->setSearchableColumns(['id']);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="100" src = "' . $row->image . '">';
            return $img;
        });
        return $data_table->toJSON();
    }
    public function get_states($post)
    {
        // echo"<pre>";print_r($post);exit;
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
    public function get_brand($get)
    {

        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('id,brand');

        if (!empty($post)) {
            $builder->like('brand', (@$get['searchTerm']) ? @$get['searchTerm'] : '');
        }

        $builder->where('is_delete', 0);
        // $builder->limit(3);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['brand'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function get_category($get)
    {

        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('id,category');

        if (!empty($post)) {
            $builder->like('category', (@$get['searchTerm']) ? @$get['searchTerm'] : '');
        }

        $builder->where('is_delete', 0);
        // $builder->limit(3);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['category'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function insert_wishlist($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("wishlist");
        $pdata = array(
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'product_id' => $post['productid'],
        );
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = session('uid') ? session('uid') : session('guestid');

        $res = $builder->insert($pdata);
        if ($res) {
            $msg = array('st' => 'success', "msg" => "Item Added to wish");
        } else {
            $msg = array('st' => 'failed', "msg" => "Failed to wish");
        }
        return $msg;
    }
    public function get_wishlist()
    {
        $db = $this->db;
        $builder = $db->table('wishlist w');
        $builder->select('w.id,i.image,i.name,i.price,w.product_id');
        $builder->join('item i', 'i.id=w.product_id');
        $builder->where('w.user_id', session('uid') ? session('uid') : session('guestid'));
        $builder->where('w.is_delete', 0);
        $query =  $builder->get();
        $result = $query->getResultArray();
        return $result;
    }
    public function insert_review($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("review");
        $pdata = array(
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'product_id' => $post['product_id'],
            'rating' => $post['rating'],
            'review' => $post['review'],
            'name' => $post['name'],
            'email' => $post['email'],
        );
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = session('uid') ? session('uid') : session('guestid');

        $res = $builder->insert($pdata);
        if ($res) {
            $msg = array('st' => 'success', "msg" => "Review Added Successfully");
        } else {
            $msg = array('st' => 'failed', "msg" => "Failed to Review");
        }
        return $msg;
    }
    public function get_review($id)
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('review');
        $builder->select('*');
        $builder->where('product_id', $id);
        $builder->where('is_delete', 0);
        $query = $builder->get();
        $result = $query->getResultArray();
        // echo "<pre>"; print_r($result);exit;

        return $result;
    }
    public function fetch_data($post, $page)
    {
        // print_r($post);
        // exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');
        // $builder->where('is_delete',0);
        $results_per_page = 6;
        $page_first_result = ($page - 1) * $results_per_page;

        if (!empty($post['brand_id'])) {
            $builder->where('brand', $post['brand_id']);
        }
        if (!empty($post['category_id'])) {
            $builder->where('category', $post['category_id']);
        }
        if (!empty($post['cat'])) {
            $builder->where('category', $post['cat']);
        }
        if (!empty($post['brand'])) {
            $builder->where('brand', $post['brand']);
        }
        if (empty($post['price'])) {
            $builder->where('is_delete', 0);
        } elseif (!empty($post['price'] == '1')) {
            $builder->orderBy('created_at', 'desc');
        } elseif (!empty($post['price'] == '2')) {
            $builder->orderBy('price', 'asc');
        } elseif (!empty($post['price'] == '3')) {
            $builder->orderBy('price', 'desc');
        }

        $number_of_result = $builder->countAllResults();
        $number_of_page = ceil($number_of_result / $results_per_page);
        //    print_r( $number_of_page);exit;
        $builder->select('*');
        if (!empty($post['brand_id'])) {
            $builder->where('brand', $post['brand_id']);
        }
        if (!empty($post['category_id'])) {
            $builder->where('category', $post['category_id']);
        }
        if (!empty($post['cat'])) {
            $builder->where('category', $post['cat']);
        }
        if (!empty($post['brand'])) {
            $builder->where('brand', $post['brand']);
        }
        if (empty($post['price'])) {
            $builder->where('is_delete', 0);
        } elseif (!empty($post['price'] == '1')) {
            $builder->orderBy('created_at', 'desc');
        } elseif (!empty($post['price'] == '2')) {
            $builder->orderBy('price', 'asc');
        } elseif (!empty($post['price'] == '3')) {
            $builder->orderBy('price', 'desc');
        } else {
            $builder->orderBy('id', 'asc');
        }
        $builder->limit($results_per_page, $page_first_result);
        $result = $builder->get();

        $paging = '<ul class="pagination justify-content-center">';
        if ($page > 1) {
            $paging .= ' <li class="page-item"><a class="page-link" ' .
                'href="' . url('Home/fetch_data/' . ($page - 1)) . '" data-ci-pagination-page="' . ($page - 1) . '">' . 'PREV</a></li>';
        }
        if ($page > 4) {
            $paging .= '<li class="page-item"><a class="page-link"' .
                'href="' . url('Home/fetch_data/' . ($page - 1)) . '" data-ci-pagination-page="1">1</a></li>' .
                '<li class="blank">...</li>';
        }
        if ($page - 2 > 0) {
            $paging .= '<li class="page-item"><a class="page-link"' .
                'href="' . url('Home/fetch_data/' . ($page - 2)) . '" data-ci-pagination-page="' . ($page - 2) . '">' . ($page - 2) . '</a>' .
                '</li>';
        }
        if ($page - 1 > 0) {
            $paging .= '<li class="page-item"><a class="page-link"' .
                'href="' . url('Home/fetch_data/' . ($page - 1)) . '" data-ci-pagination-page="' . ($page - 1) . '">' . ($page - 1) . '</a>' .
                '</li>';
        }
        $paging .= '<li class="page-item"><a class="page-link current"
    href="' . url('Home/fetch_data/' . ($page)) . '" data-ci-pagination-page="' . ($page) . '">' . $page . '</a>
    </li>';

        if ($page + 1 < $number_of_page + 1) {
            $paging .= '<li class="page-item"><a class="page-link"
        href="' . url('Home/fetch_data/' . ($page + 1)) . '" data-ci-pagination-page="' . ($page + 1) . '">' . ($page + 1) . '</a>
    </li>';
        }
        if ($page + 2 < $number_of_page + 1) {
            $paging .= '<li class="page-item"><a class="page-link"
        href="' . url('Home/fetch_data/' . ($page + 2)) . '" data-ci-pagination-page="' . ($page + 2) . '">' . ($page + 2) . '</a>
    </li>';
        }

        if ($page < $number_of_page - 2) {
            $paging .= '<li lass="page-item">...</li>
        <li><a class="page-link"
                href="' . url('Home/fetch_data/' . ($number_of_page)) . '" data-ci-pagination-page="' . ($number_of_page) . '">' . $number_of_page . '</a>
        </li>';
        }

        if ($page < $number_of_page) {
            $paging .= '<li class="page-item"><a class="page-link"
        href="' . url('Home/fetch_data /' . ($page + 1)) . '" data-ci-pagination-page="' . ($page + 1) . '" >Next</a></li>';
        }
        $paging .= '</ul>';
        $output = '';
        // echo "<pre>";print_r($result->getResultArray());exit;
        foreach ($result->getResultArray() as $row) {

            $output .= '
                <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                    <div class="product_grid card b-0">
                        <!-- <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div> -->
                        <button class="snackbar-wishlist btn btn_love position-absolute ab-right wish" id="wishlist" data-product_id="' . @$row['id'] . ' " data-price="' . @$row['listedprice'] . '" data-quantity="1"><i class="far fa-heart"></i></button>
                        <div class="card-body p-0">
                            <div class="shop_thumb position-relative">
                                <a class="card-img-top d-block overflow-hidden" href="' . url('Home/productdetail/' . $row['id']) . '"><img class="card-img-top" src="' . $row['image'] . '" alt="..." style="height: 350px ;width: 280px;"></a>
                                <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                    <div class="edlio"><a class="text-white fs-sm ft-medium cartbtn" data-product_id="' . @$row['id'] . '" data-price="' . @$row['listedprice'] . '" data-quantity="1"><i class="lni lni-shopping-basket mr-1"></i>Add to cart</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer b-0 p-0 pt-2 bg-white">
                            <div class="text-left">
                                <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="' . url('Home/productdetail/' . $row['id']) . '">' . $row['name'] . '</a></h5>
                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">₹' . $row['listedprice'] . '</span><span class="text-secondary p-2 p-2"><del>₹' . $row['price'] . '</del></span><span class="text-success bg-light-success rounded px-2 py-1">' . $row['discount'] . ' % off</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
        return array('product_list' => $output, 'pagination_link' => $paging);
    }
    public function UpdateData($post)
    {
        $result = array();
        $db = $this->db;

        if ($post['type'] == 'Remove') {
            $builder = $db->table('cart');
            $builder->where("id", @$post['pk']);
            $result = $builder->update(array('is_delete' => '1'));
            $result = array('st' => 'success');
        }
        if ($post['type'] == 'Wishlist') {
            $builder = $db->table('wishlist');
            $builder->where("id", @$post['pk']);
            $result = $builder->update(array('is_delete' => '1'));
            $result = array('st' => 'success');
        }
        return $result;
    }
    public function payment_data($post)
    {
        // echo "<pre>";
        // print_r($post);
        // exit;
        // if (!empty($post['add2'])) {
        //     $ship_id = $post['id'];
        //     $default_add = 0;
        // } else {

        //     $ship_id = 0;
        //     $default_add = session('id');
        // }
        $db = $this->db;
        $builder = $db->table('shipping_address');
        $adata = array(
            'fname' => $post['fname'],
            'lname' => $post['lname'],
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'email' => $post['email'],
            'mobileno' => $post['mobileno'],
            'address1' => $post['address'],
            'state' => $post['state'],
            'city' => $post['city'],
            'pincode' => $post['pincode'],
            // 'type' => $post['address_type']
        );
        $result = $builder->insert($adata);
        $ship_id = $db->insertID();

        $db = $this->db;
        $builder = $db->table('orders');
        $order_data = array(
            'user_id' => session('uid') ? session('uid') : session('guestid'),
            'total_payment' => $post['grand_total'],
            'ship_id' => $ship_id,
            // 'default_add' => $default_add,
            'payment_type' => 'Razorpay',
            'is_login' => session('id') ? 0 : 1
        );
        $order_data['created_at'] = date('Y-m-d H:i:s');
        $order_data['created_by'] = session('uid') ? session('uid') : session('guestid');
        $result = $builder->insert($order_data);
        $orderid = $db->insertID();
        $db = $this->db;
        $builder = $db->table('order_item');
        $qty = $post['qty'];
        for ($i = 0; $i < count($qty); $i++) {
            $order_item = array(
                'order_id' => @$orderid,
                'user_id' => session('uid') ? session('uid') : session('guestid'),
                'quantity' => $post['qty'][$i],
                'product_id' => $post['cart_id'][$i],
                'price' => $post['price'][$i],
                'total' => $post['sub'][$i]
            );
            $result = $builder->insert($order_item);
            $order_itemid = $db->insertID();
        }
        /**
         * payment processing
         */
        // if ($post['payment'] == 'Razorpay') {

        $builder = $db->table('payment_log');
        $TransactionAmount =  $post['grand_total'];
        // $type = $post['payment'];
        $txnid = generateTransactionId();
        $data = array(
            "UserId" => session('uid') ? session('uid') : session('guestid'),
            "ord_id" => $orderid,
            "TxnId" => $txnid,
            "TransactionAmount" => $TransactionAmount,
            "PaymentType" => 'Razorpay',
            "PaymentDetail" => '',
            "PayIn" => 1,
            "PayOut" => 0,
            "PaymentInProccesing" => 1,
            "PaymentSuccess" => 0,
            "PaymentFailed" => 0,
            "PatmentExecute" => 0,
            "PaymentRefrenceId" => '',
            "PaymentDescription" => '',
            "CreateTime" => date("Y-m-d H:i:s"),
            "CreateBy" => session('uid') ? session('uid') : session('guestid'),
        );
        $builder->insert($data);
        $response = "Redirecting to Payment Gateway ... Please wait !!! Don't press Back or Refresh";
        $shipingDetails = array(
            'email' => $post['email'],
            'contact' => $post['mobileno'],
            'username' => $post['fname']
        );
        helper('rozorpay');
        $payment = SendRazor($TransactionAmount, $txnid, $shipingDetails);
        return $payment;
        // } else {
        //     $db = $this->db;
        //     $builder = $db->table('order');
        //     $builder->where('user_id', session('id'));
        //     $Userbuilder = $db->table('cart');
        //     $Userbuilder->where('user_id', session('id'));
        //     $res = $Userbuilder->update(array('is_delete' => '1'));
        //     if ($res) {
        //         echo  view('ordersuccess');
        //     }
    }
    // return $data;
    // echo "<pre>";print_r($data);exit;
    public function get_max_val()
    {
      $db = $this->db;
      $builder = $db->table('item');
      $builder->select('MAX(price) as max_value');
      $builder->where('is_delete', '0');
      $query = $builder->get();
      $max_value = $query->getRow();
      return $max_value->max_value;
    }
}
