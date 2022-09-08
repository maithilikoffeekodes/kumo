<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\admin\GeneralModel;

class Home extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new HomeModel();
        $this->gmodel = new GeneralModel();
    }
    public function index()
    {
        // if (!session('guestid') && !session('uid')) {
        //     $guestid = generateTransactionId();
        //     $session = session();
        //     $session->set('guestid', $guestid);
        // }
        $data['rand_item'] = $this->model->get_randomitem_data();
        $data['rand_slider'] = $this->model->get_randomslider_data();

        // echo"<pre>";print_r($data);exit;    
        return view('index', $data);
    }
    public function login()
    {
        $msg = array('st' => '', 'msg' => '');
        $post = $this->request->getPost();
        if (!empty($post) && isset($post['email']) && isset($post['password'])) {
            $msg = $this->model->login($post);
        }
        $data['msg'] = $msg;
        if ($msg['st'] == 'success') {
            return redirect()->to(url('Home/index'));
        }
        return view('login', $data);
    }
    public function register($id = '')
    {
        // $post = $this->request->getPost();
        // if (!empty($post)) {
        //     $msg = $this->model->insert_edit_data($post);
        //     return $this->response->setJSON($msg);
        // }

        // $data['data'] = $this->model->get_register_data('data', $id);
        // print_r($data);exit;
        return view('register');
    }
    public function productdetail($id = '')
    {
        $data['product'] = $this->model->get_product_data($id);
        return view('productdetail', $data);
    }
    public function shoplist()
    {
        return view('shoplist');
    }
    public function cart()
    {
        $post = $this->request->getPost();
        if (!empty($post)) {
            // echo"<pre>";print_r($post);exit;
            $msg = $this->model->insert_cart_data($post);
            return $this->response->setJSON($msg);
        }
        return view('cart');
    }
    public function wishlist(){
        
        return view('wishlist');
    }
    public function checkout(){

        return view('checkout');
    }
    public function Getdata($method = '')
    {
        // print_r($method);exit;
        if ($method == 'getstate') {
            $get = $this->request->getGet();
            $data = $this->model->get_states($get);
            return $this->response->setJSON($data);
        }
        if ($method == 'getcity') {
            $post = $this->request->getPost();
            $data = $this->model->get_city($post);
            return $this->response->setJSON($data);
        }
    }
}
