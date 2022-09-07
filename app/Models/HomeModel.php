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
        $builder = $db->table('signup');
        $builder->select('*');
        $builder->where(array('id' => $post['id']));
        $query = $builder->get();
        $result = $query->getRowArray();

        $pdata = array(
            'name' => $post['name'],
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
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('signup');
        $builder->select('*');
        $builder->where(array('email' => $post['email'], 'is_delete' => '0'));
        $result = $builder->get();
        $result_array = $result->getRow();
        //  print_r($result_array);exit;
        $msg = array();
        if (!empty($result_array)) {
            // print_r($result_array);exit;
            if ($post['password'] == $result_array->password) {
                // print_r($post['password']);exit;
                $newdata = [
                    'id' => $result_array->id,
                    'email' => $result_array->email,
                    // 'password'=>$result_array->password
                ];
                // print_r($newdata);exit;
                $session = session();
                $session->set($newdata);
                //  echo "<pre>";print_r(session('id')); exit;
                $msg = array("st" => "success", "msg" => "Login Successfully!!!");
            } else {
                $msg = array("st" => "failed", "msg" => "Username or Password are Wrong!!!");
            }
        }
        return $msg;
    }
    public function get_data()
    {
        // print_r('dsvsdvf');exit;
        $db = $this->db;
        $builder = $db->table('signup');
        $builder->select('id,name,email,password,mobileno');
        $builder->where('is_delete', '0');
        $data_table = DataTable::of($builder);
        $data_table->setSearchableColumns(['id']);
        $data_table->edit('image', function ($row) {
            // print_r('rfvrvrgv');exit;
            $img = '<img height="100" width ="100" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {
            $btnedit = '<a  href="' . url('Home/register/') . $row->id . '"  class="btn btn-link pd-10"><i class="far fa-edit"></i></a> ';

            $btndelete = '<a  title="Account Name: ' . $row->name . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="far fa-trash-alt"></i></a> ';
            return $btnedit . $btndelete;
        });

        return $data_table->toJSON();
    }
    public function get_register_data($method)
    {
        // print_r($method);exit;
        $db = $this->db;
        $result = array();
        if ($method == 'data') {
            // print_r($method);exit;
            $builder = $db->table('signup u');
            $builder->select('u.*,s.sname as state_name,c.cname as city_name');
            $builder->join('cities c', 'c.id=u.city');
            $builder->join('states s', 's.id=u.state');
            $builder->where('u.id', session('id'));
            $query = $builder->get();
            $result = $query->getRowArray();
            //   echo '<pre>'; print_r($result);exit;
        }

        return $result;
    }
    public function DeleteData($post)
    {
        $result = array();
        $db = $this->db;
        if ($post['type'] == 'Remove') {
            $builder = $db->table('signup');
            $builder->where("id", @$post['pk']);
            $result = $builder->update(array('is_delete' => '1'));
            $result = array('st' => 'success');
        }


        return $result;
    }
    public function DeleteAddData($post)
    {
        $result = array();
        $db = $this->db;
        if ($post['type'] == 'Remove') {
            $builder = $db->table('address');
            $builder->where("id", @$post['pk']);
            $result = $builder->update(array('is_delete' => '1'));
            $result = array('st' => 'success');
        }

        return $result;
    }

    public function get_randomcategory_data($post, $id)
    {
        //  print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');
        if ($id != '') {
            $builder->where('brand', $id);
        }
        if (isset($post['sort'])) {

            if ($post['sort'] == 'lowtohigh') {
                $builder->orderBy('price', 'asc');
            } elseif ($post['sort'] == 'hightolow') {
                // echo '<pre>'; print_r($post);exit;
                $builder->orderBy('price', 'desc');
            } else {
                $builder->orderBy('id', 'RANDOM');
            }
        }
        $builder->where('is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        // $result = $query->getResultArray();
        $output = '';

        foreach ($query->getResultArray() as $row) {
            // $p = $row["name"];

            // $discount = $row['discount'];

            // $img = 0;
            // $uid = session('uid');
            $output .= '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <a href="' . url('Home/productdetail/' . $row['id']) . '"> <img class="img-fluid w-100" src="' . @$row['image'] . '" alt="" style="height:400px ;"></a>
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square cartbtn" id="cartbtn" data-product_id="' . @$row['id'] . '" data-price="' . @$row['price'] . '" data-quantity="1"><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square wish" id="wish" data-product_id="' . @$row['id']  . '" data-price="' . @$row['price'] . '" data-quantity="1"><i class="far fa-heart"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href="' . url('Home/productdetail/' . @$row['id']) . '"><' . @$row['item'] . '></a>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5><' . @$row['price'] . '></h5>
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mb-1">
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small class="fa fa-star text-primary mr-1"></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
        </div>';
        }
        return array('product_list' => $output);
        // return $getCategoryitem;
    }

    public function get_items($post)
    {
        // print_r($post);
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.*,b.brand as brand_name');
        $builder->where('i.is_delete', '0');
        $builder->join('brand b', 'b.id =  i.brand');
        if (!empty($post)) {
            if ($post['item_name']) {
                $builder->where('item', $post['item_name']);
            }
            if ($post['from'] || $post['to']) {
                $form  = $post['from'];
                $to = $post['to'];
                $builder->where("price BETWEEN '$form' AND '$to'");
            }
            if ($post['brand']) {
                // print_r($post);exit;
                $builder->where('b.brand', $post['brand']);
            }
        }
        $query = $builder->get();
        $result = $query->getResultArray();

        return $result;
    }


    public function get_randomitem_data()
    {
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.*,r.rating');
        $builder->join('review r', 'r.product_id=i.id');
        $builder->orderBy('i.id', 'RANDOM');
        $builder->where('i.is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRanditem = $query->getResultArray();
        // echo "<pre>";print_r($getRanditem);exit;
        return $getRanditem;
    }
    public function get_categoryitem_data()
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('category c');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('c.is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRanditem = $query->getResultArray();
        // print_r($getRanditem);exit;
        return $getRanditem;
    }

    public function get_category_data($id = '')
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');
        if ($id != '') {
            $builder->where('category', $id);
        } else {
            $builder->orderBy('id', $id);
        }
        $builder->where('is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRanditem = $query->getResultArray();
        // echo"<pre>";print_r($getRanditem);exit;
        return $getRanditem;
    }
    public function get_brand_data($id = '')
    {
        // print_r($id);exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');
        if ($id != '') {
            $builder->where('brand', $id);
        } else {
            $builder->orderBy('id', $id);
        }
        $builder->where('is_delete', '0');
        $builder->limit(8);
        $query = $builder->get();
        $getRanditem = $query->getResultArray();
        // echo"<pre>";print_r($getRanditem);exit;
        return $getRanditem;
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
        $builder->select('id,name');

        if (!empty($post)) {
            $builder->like('name', (@$get['searchTerm']) ? @$get['searchTerm'] : '');
        }

        $builder->where('is_delete', 0);
        // $builder->limit(3);
        $query = $builder->get();
        $getdata = $query->getResultArray();
        // print_r($getdata);exit;
        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['name'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function get_states($post)
    {
        $db = $this->db;
        $builder = $db->table('states');
        $builder->select('id,sname');
        $builder->like('sname', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $builder->limit(50);
        $query = $builder->get();
        $getdata = $query->getResultArray();

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
    public function fetch_data($post, $page)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');

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
        } elseif (!empty($post['price'] == 'lowtohigh')) {
            // print_r($post['sort']);exit;
            $builder->orderBy('price', 'asc');
        } elseif (!empty($post['price'] == 'hightolow')) {
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
        } elseif (!empty($post['price'] == 'lowtohigh')) {
            // print_r($post['sort']);exit;
            $builder->orderBy('price', 'asc');
        } elseif (!empty($post['price'] == 'hightolow')) {
            $builder->orderBy('price', 'desc');
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
            
            $output .= '<div class="col-lg-4 col-md-6 col-sm-6 pb-1" id="product-list" onclick="getproduct('.$row['id'].')">
                            <div class="product-item bg-light mb-4" style="width:390px;">
                                 <div class="product-img position-relative overflow-hidden">
                                    <a href="' . url('Home/productdetail/' . @$row['id']) . '"> <img class="img-fluid" src="' . @$row['image'] . '" alt="" style="height:400px ; width:390px;"></a>
                                    <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square cartbtn" id="cartbtn" data-product_id="' . @$row['id'] . ' " data-price="' . @$row['price'] . '" data-quantity="1"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square wish" id="wish" data-product_id="' . @$row['id'] . ' " data-price="' . @$row['price'] . '" data-quantity="1"><i class="far fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="' . url('Home/productdetail/' . @$row['id']) . '">' . @$row['item'] . '</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5> ₹' . @$row["price"] - @$row["dis_price"] . '</h5>
                                        <h6 class="text-muted ml-2"><del> ₹' . @$row['price'] . '</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center mb-1">';
            for (@$i = 1; @$i <= get_review_count($row['id']); @$i++) {
                $output .= '<i class="text-primary fas fa-star" value="1"></i>';
            }
            for (@$i = 1; @$i <= 5 - (int)get_review_count($row['id']); @$i++) {
                $output .= ' <i class="text-primary far fa-star" value="1"></i>';
            }


            $output .= '<small class="pt-1">(' . get_review_total($row['id']) . ') Reviews</small>
                                </div>
                                </div>
                            </div>
                        </div>';
        }
        return array('product_list' => $output, 'pagination_link' => $paging);
    }
    public function get_slider_data()
    {
        $db = $this->db;
        $builder = $db->table('slider');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('is_delete', '0');
        $builder->limit(3);
        $query = $builder->get();
        $getslider = $query->getResultArray();
        // echo "<pre>";print_r($getslider);exit;

        return $getslider;
    }
    public function get_brand_slider()
    {
        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('*');
        $builder->orderBy('id', 'RANDOM');
        $builder->where('is_delete', '0');
        $query = $builder->get();
        $getslider = $query->getResultArray();
        // echo "<pre>";print_r($getslider);exit;

        return $getslider;
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
    public function get_related_product_data($cid)
    {
        // print_r($cid);exit;
        $db = $this->db;
        $builder = $db->table('item i');
        $builder->select('i.id,i.category,i.item as item_name,i.image as item_image,c.name as cat_name,c.image as cat_image,i.price,i.dis_price');
        $builder->join('category c', 'c.id=i.category');
        $builder->where('c.id', $cid);
        $query = $builder->get();
        $relatedproduct = $query->getResultArray();
        // echo "<pre>"; print_r($relatedproduct);exit;
        return $relatedproduct;
    }
    public function insert_cart_data($post)
    {
        // echo "<pre>";print_r($post);exit;                                                                         
        $db = $this->db;
        $builder = $db->table("cart");
        $builder->select('*');
        $builder->where(array('user_id' => session('id'), 'product_id' => $post['product_id'], 'is_delete' => 0));
        $query =  $builder->get();
        $result = $query->getRowArray();
        // echo "<pre>";print_r($result);exit;
        $pdata = array(
            'user_id' => session('id'),
            'product_id' => $post['product_id'],
            'quantity' => $post['quantity'],
            'date' => date('y-m-d'),
            'price' => $post['price']
        );

        if(!empty($result)){
            $builder->where(array('user_id' => session('id'), 'product_id' => $post['product_id']));
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'added', 'msg' => 'Item Update to Cart');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Failed Update to Cart');
            }
        }
       else{
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = session('id');

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
        $builder->select('c.id,image,i.item,i.price,c.quantity');
        $builder->join('item i', 'i.id=c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('id'));
        $data_table = DataTable::of($builder);
        // print_r(session('id'));
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="130" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {

            $btnquantity = '
      <div class="qty_class" style="width:110px;">
      <button class="btn btn-sm btn-primary btn-minus decrement" type="button" onclick="decrement(this)">
      <i class="fa fa-minus" style="margin-right:1px;"></i></button>
      <span class="count" style="margin-left:5px;margin-right:5px;">' . $row->quantity . '</span>
      <input type="hidden" class="form-control qty" name="qty[]" value="' . $row->quantity . '">
      <input type="hidden" class="form-control qty" name="cart_id[]" value="' . $row->id . '">
      <input type="text" class="form-control price_hidden d-none" name="price[]" value="' . $row->price . '">
      <button class="btn btn-sm btn-primary btn-plus increment" type="button" onclick="increment(this)">
      <i class="fa fa-plus"></i></button>
      </div>';

            return $btnquantity;
        });

        $data_table->add('action', function () {
            $btntotal = '<input type="" class="total text-center" name="sub[]" readonly style="border:none;color:#6F6F6F;">';
            return $btntotal;
        });
        $data_table->add('action', function ($row) {
            $btndelete = '<a data-toggle="modal" target="_blank"   title="Item Name: ' . $row->item . '"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" onclick="editable_remove(this)"  tabindex="-1" class="btn btn-link"><i class="fa fa-trash"></i></a> ';
            return $btndelete;
        })
            ->hide('id')
            ->hide('quantity');

        return $data_table->toJSON();
    }
    public function DeleteCartData($post)
    {
        $result = array();
        $db = $this->db;
        if ($post['type'] == 'Remove') {
            $builder = $db->table('cart');
            $builder->where("id", @$post['pk']);
            $result = $builder->update(array('is_delete' => '1'));
            $result = array('st' => 'success');
        }
        return $result;
    }
    public function update_cart_data($post)
    {
        $db = $this->db;
        $builder = $db->table('cart');
        $qty = $post['qty'];
        $cart_id = $post['cart_id'];
        for ($i = 0; $i < count($qty); $i++) {
            $pdata = array(
                'quantity' => $qty[$i]
            );
            $builder->where('id', $cart_id[$i]);
            $builder->update($pdata);
        }
        return true;
    }
    public function get_cart1_data()
    {
        $db = $this->db;
        $builder = $db->table('cart c');
        $builder->select('c.id,image,i.item,i.price,c.quantity,c.product_id');
        $builder->join('item i', 'i.id=c.product_id');
        $builder->where('c.is_delete', 0);
        $builder->where('c.user_id', session('id'));
        $data_table = DataTable::of($builder);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="130" src = "' . $row->image . '">';
            return $img;
        });
        $data_table->add('action', function ($row) {

            $btnquantity = '
      <div class="qty_class" style="width:110px;">
      <span class="count" style="margin-left:5px;margin-right:5px;">' . $row->quantity . '</span>
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
    public function insert_wishlist($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("wish");
        $pdata = array(
            'user_id' => session('id'),
            'product_id' => $post['productid'],

        );
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = session('id');

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
        $builder = $db->table('wish w');
        $builder->select('w.id,i.image,i.item,i.price,w.product_id');
        $builder->join('item i', 'i.id=w.product_id');
        $builder->where('w.user_id', session('id'));
        $builder->where('w.is_delete', 0);
        $data_table = DataTable::of($builder);
        $data_table->setSearchableColumns(['id']);
        $data_table->edit('image', function ($row) {
            $img_tag = '<img src=" ' . $row->image . ' " width="100" height="130">';
            return $img_tag;
        });

        $data_table->add('addtocart', function ($row) {

            $btnview = '<a class="btn btn-link pd-10 cartbtn"  onclick="addtocart(this)"  id="cartbtn" data-product_id="' . $row->product_id . '" data-price="' . $row->price . '" data-quantity="1"> <i class="fas fa-shopping-cart "></i></a> ';
            return $btnview;
        });
        $data_table->add('action', function ($row) {
            $btndelete = '<a  title="Item Name: ' . $row->item . '"  data-val="' . $row->id . '" 
            data-pk="' . $row->id . '" onclick="editable_remove(this)" 
            tabindex="-1" class="btn btn-close btn-outline-danger"><i class="fa fa-trash"></i></a> ';
            return $btndelete;
        })
            ->hide('id')
            ->hide('product_id');
        return $data_table->toJSON();
    }
    public function DeleteWishData($post)
    {
        $result = array();
        $db = $this->db;
        if ($post['type'] == 'Remove') {
            $builder = $db->table('wish');
            $builder->where("id", @$post['pk']);
            $result = $builder->update(array('is_delete' => '1'));
            $result = array('st' => 'success');
        }
        return $result;
    }
    public function payment_data($post)
    {
        // echo "<pre>";print_r($post);exit;
        if (!empty($post['add2'])) {
            $ship_id = $post['id'];
            $default_add = 0;
        } else {

            $ship_id = 0;
            $default_add = session('id');
        }
        $db = $this->db;
        $builder = $db->table('order');
        $order_data = array(
            'user_id' => session('id'),
            'total_payment' => $post['grand_total'],
            'ship_id' => $ship_id,
            'default_add' => $default_add,
            'payment_type' => $post['payment'],
            'is_login' => session('id') ? 0 : 1
        );
        $order_data['created_at'] = date('Y-m-d H:i:s');
        $order_data['created_by'] = session('id');
        $result = $builder->insert($order_data);
        $orderid = $db->insertID();
        $db = $this->db;
        $builder = $db->table('order_item');
        $qty = $post['qty'];
        for ($i = 0; $i < count($qty); $i++) {
            $order_item = array(
                'order_id' => @$orderid,
                'user_id' => session('id'),
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
        if ($post['payment'] == 'Razorpay') {

            $builder = $db->table('payment_log');
            $TransactionAmount =  $post['grand_total'];
            $type = $post['payment'];
            $txnid = generateTransactionId();
            $data = array(
                "UserId" => session('id'),
                "ord_id" => $orderid,
                "TxnId" => $txnid,
                "TransactionAmount" => $TransactionAmount,
                "PaymentType" => $type,
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
                "CreateBy" => session('id'),
            );
            $builder->insert($data);
            $response = "Redirecting to Payment Gateway ... Please wait !!! Don't press Back or Refresh";
            $shipingDetails = array(
                'email' => 'bhushansalunkhe20@gmail.com',
                'contact' => '9595888075',
                'username' => 'bhushan'
            );
            helper('rozorpay');
            $payment = SendRazor($TransactionAmount, $txnid, $shipingDetails);
            return $payment;
        } else {
            $db = $this->db;
            $builder = $db->table('order');
            $builder->where('user_id', session('id'));
            $Userbuilder = $db->table('cart');
            $Userbuilder->where('user_id', session('id'));
            $res = $Userbuilder->update(array('is_delete' => '1'));
            if ($res) {
                echo  view('ordersuccess');
            }
        }
        // return $data;
        // echo "<pre>";print_r($data);exit;
    }
    public function insert_edit_contact($post)
    {
        helper('send_mail');
        // print_r($post);
        $db = $this->db;
        $builder = $db->table('contact_us');
        $pdata = array(
            'name' => $post['name'],
            'email' => $post['email'],
            'mobileno' => $post['mobileno'],
        );
        $res = $builder->insert($pdata);
        if ($res) {
            $msg = array('st' => 'success', 'msg' => 'Insert successfully');
        } else {
            $msg = array('st' => 'failed');
        }
        send_mail($post);
        return $msg;
    }
    public function insert_edit_address($post)
    {
        //  print_r($post);exit; 
        $db = $this->db;
        $builder = $db->table('address');
        $builder->select('*');
        $builder->where('id', $post['id']);
        $builder->where('is_delete', 0);
        $query = $builder->get();
        $result = $query->getResultArray();
        // print_r($post);exit;
        $adata = array(
            'name' => $post['name'],
            'user_id' => session('id'),
            'email' => $post['email'],
            'mobileno' => $post['mobileno'],
            'address' => $post['address'],
            'state' => $post['state'],
            'city' => $post['city'],
            'pincode' => $post['pincode'],
            'type' => $post['address_type']
        );
        if (!empty($result)) {
            // print_r($result);exit;
            $builder->where('id', $post['id']);
            $res = $builder->update($adata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed', 'msg' => 'Update failed');
            }
        } else {
            $res = $builder->insert($adata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Insert successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        }

        return $msg;
    }
    public function get_address_data()
    {
        $db = $this->db;
        $builder = $db->table('signup u');
        $builder->select('u.*,s.sname as state_name,c.cname as city_name');
        $builder->join('cities c', 'c.id=u.city');
        $builder->join('states s', 's.id=u.state');
        $builder->where('u.id', session('id'));
        $builder->where('u.is_delete', 0);
        $query = $builder->get();
        $result1 = $query->getResultArray();

        $builder = $db->table('address a');
        $builder->select('a.*,s.sname as state_name,c.cname as city_name');
        $builder->join('cities c', 'c.id=a.city');
        $builder->join('states s', 's.id=a.state');
        $builder->where('user_id', session('id'));
        $builder->where('a.is_delete', 0);
        $query = $builder->get();
        $result2 = $query->getResultArray();
        // echo "<pre>";print_r($result);exit;
        $result = array_merge($result1, $result2);
        return $result;
    }
    public function getaddress($post)
    {
        $db =  $this->db;
        $builder = $db->table('address a');
        $builder->select('a.*,s.sname as state_name,c.cname as city_name');
        $builder->join('cities c', 'c.id=a.city');
        $builder->join('states s', 's.id=a.state');
        $builder->where('a.id', $post['val']);
        $builder->where('a.is_delete', 0);
        $query = $builder->get();
        $result = $query->getRowArray();
        return $result;
    }
    public function get_order()
    {
        $db = $this->db;
        $builder = $db->table('order o');
        $builder->select('o.id,o.transaction_id,o.created_at,o.total_payment,');
        $builder->where('user_id', session('id'));
        $builder->where('o.is_delete', '0');
        $data_table = DataTable::of($builder);
        $data_table->setSearchableColumns(['id']);
        $data_table->add('action', function ($row) {
            $btnview = '<a href="' . url('Home/orderview/') . $row->id . '"  class="btn btn-link pd-10"><i class="far fa-eye"></i></a> ';
            return $btnview;
        });
        return $data_table->toJSON();
    }

    public function get_orderview_data($get)
    {
        $db = $this->db;
        $builder = $db->table('order_item oi');
        $builder->select('i.image,i.item,oi.price,oi.quantity,oi.total');
        $builder->join('item i', 'i.id=oi.product_id');
        // $builder->join('states s', 's.id=');
        // $builder->join('cities c', 'c.id=');
        $builder->where('oi.order_id', $get);
        $builder->where('oi.is_delete', '0');
        $data_table = DataTable::of($builder);
        $data_table->setSearchableColumns(['id']);
        $data_table->edit('image', function ($row) {
            $img = '<img height="100" width ="100" src = "' . $row->image . '">';
            return $img;
        });
        return $data_table->toJSON();
    }
    public function get_order_data($id)
    {
        $db = $this->db;
        $builder = $db->table('order o');
        $builder->select('o.*');
        $builder->where('o.id', $id);
        $builder->where('o.is_delete', 0);
        $query = $builder->get();
        $result2 = $query->getRowArray();
        if ($result2['default_add'] != 0) {
            $db = $this->db;
            $builder = $db->table('signup u');
            $builder->select('u.*,s.sname as state_name,c.cname as city_name');
            $builder->join('cities c', 'c.id=u.city');
            $builder->join('states s', 's.id=u.state');
            $builder->where('u.id', $result2['default_add']);
            $builder->where('u.is_delete', 0);
            $query = $builder->get();
            $result1 = $query->getRowArray();
        } else {
            $db = $this->db;
            $builder = $db->table('address a');
            $builder->select('a.*,s.sname as state_name,c.cname as city_name');
            $builder->join('cities c', 'c.id=a.city');
            $builder->join('states s', 's.id=a.state');
            $builder->where('a.id', $result2['ship_id']);
            $builder->where('a.is_delete', 0);
            $query = $builder->get();
            $result1 = $query->getRowArray();
        }
        $result = array_merge($result1, $result2);
        // echo"<pre>";print_r($result);exit;

        return $result;
    }
    public function insert_review($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("review");
        $pdata = array(
            'user_id' => session('id'),
            'product_id' => $post['product_id'],
            'rating' => $post['rating'],
            'review' => $post['review'],
            'name' => $post['name'],
            'email' => $post['email'],
        );
        $pdata['created_at'] = date('Y-m-d H:i:s');
        $pdata['created_by'] = session('id');

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
    public function insert_edit_subscribe($post)
    {
        // print_r($post);exit;
        $db = $this->db;
        $builder = $db->table("subscribe");
        $builder->select('*');
        $builder->where('is_delete', 0);
        $builder->where(array('email' => $post['email']));
        $query = $builder->get();
        $result =  $query->getRowArray();
        if (empty($result)) {
            $data = array(
                'email' => $post['email'],
                'user_id' => session('id')
            );
            $data['created_at'] = date('Y-m-d H:i:s');
            @$data['created_by'] = session('id');

            // if (empty($msg)) {
                $res = $builder->insert($data);
                if ($res) {
                    $msg = array('st' => 'success', "msg" => "Subcribe Success");
                } else {
                    $msg = array('st' => 'failed', "msg" => "Subscrib Failed");
                }
            // }
        } else {

            $msg = array('st' => 'added', "msg" => "Also Subscibe");
        }
        return $msg;
    }
}
