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
        $data['rand_item'] = $this->model->get_randomitem_data();
        $data['rand_slider'] = $this->model->get_randomslider_data();
        if (!session('guestid') && !session('uid')) {
            $guestid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);  
            $session = session();
            $session->set('guestid', $guestid);
        }
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
            $msg = $this->model->insert_cart_data($post);
            return $this->response->setJSON($msg);
        }
        $data['cart'] = $this->model->get_cart_data(); 

        return view('cart',$data);
    }
    public function shipping_address()
    {
        $post = $this->request->getPost();
        echo"<pre>";print_r($post);exit;
        if (!empty($post)) {
            $msg = $this->model->insert_edit_address($post);
            return $this->response->setJSON($msg);
        }
    }
    public function wishlist(){
        
        return view('wishlist');
    }
    public function checkout(){
        $post = $this->request->getPost();
        if (!empty( $post) ) {
            $data = $this->model->payment_data($post);
            return $this->response->setJSON($data);  
        }
        $data['cart'] = $this->model->get_cart_data(); 

        return view('checkout',$data);
    }
    public function Getdata($method = '')
    {
        if ($method == 'cart') {
            $data = $this->model->get_cartupdate_data();
            return $data;
        }
        if ($method == 'final_cart') {
            $data = $this->model->get_finalcart_data();
            return $data;
        }
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
    public function Payment($type = "") 
    {
		$get = $this->request->getGet();
        
		$txn = $get['txn'];
		
		$response = "Redirecting to System ... Please wait !!! Don't press Back or Refresh";
		helper('rozorpay');
		SendReceiveRazor($txn);
		$gnmodel = $this->gmodel;
		$getdata = $gnmodel->get_data_table('payment_log', array('TxnId'=>$txn));
		if ($type == 'Fail') 
        {
			return redirect()->to(url('Home/payment_failed/0'));
		}
		if (!empty($getdata)) {
			return redirect()->to(url('Home/PaymentExcuate/'.$txn));
		} else {
			$msg = array("st" => "failed", "msg" => "ops, try again");
			$session = session();
			$session->setFlashdata('msg',$msg);
			
		}
	}
	public function PaymentExcuate($txn = "") {
		echo "Redirecting to System ... Please wait !!! Don't press Back or Refresh";
		if ($txn != "") {
			helper('rozorpay');
			PaymentExecute($txn);
			$msg = array("st" => "success", "msg" => "Payment Success");
			$session = session();
			$session->setFlashdata('msg',$msg);
		 	return redirect()->to(url('Home/payment_success/'.$txn));
		}
	} 
    
    public function payment_success($txn = '')
    {
        $data['txn'] = $txn;
       return view('payment_success', $data);
    }

    public function payment_failed($txn = '')
    {
       $data['msg'] = "Payment Cancelled";
       return view('payment_failed', $data);
    }
}
