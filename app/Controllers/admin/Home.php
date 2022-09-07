<?php

namespace App\Controllers\admin;
use App\Controllers\admin\BaseController;
use App\Models\admin\HomeModel;
use App\Models\admin\GeneralModel;

class Home extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface$request, \CodeIgniter\HTTP\ResponseInterface$response, \Psr\Log\LoggerInterface$logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new HomeModel();
           $this->gmodel = new GeneralModel();
    }
    public function index()
    {
        return view('admin/index');
    }
    public function brand(){
        if (!session('id')) {
            return redirect()->to(url('admin/Auth/login'));
        }
        return view('admin/brand/brand');
    }
    public function category(){
        if (!session('id')) {
            return redirect()->to(url('admin/Auth/login'));
        }
        return view('admin/category/category');
    }
    public function slider(){
        if (!session('id')) {
            return redirect()->to(url('admin/Auth/login'));
        }
        return view('admin/slider/slider');
    }
    public function item(){
        if (!session('id')) {
            return redirect()->to(url('admin/Auth/login'));
        }
        return view('admin/item/item');
    }
    public function createbrand($id=''){
        $post = $this->request->getPost();
        $file = $this->request->getFile('image');
        if (!empty($post)) {
            $msg = $this->model->insert_edit_brand($post,$file);
            return $this->response->setJSON($msg);
        }
        if($id!='')
        {
            $data=$this->model->get_master_data('brand',$id);
        }
        $data['id'] = $id;
        return view('admin/brand/createbrand',$data);
    }
    public function createcategory($id='')
    {
        $post = $this->request->getPost();
        $file = $this->request->getFile('image');
        if (!empty($post)) {
            $msg = $this->model->insert_edit_category($post,$file);
            return $this->response->setJSON($msg);
        }
        if($id!='')
        {
            $data=$this->model->get_master_data('category',$id);
        }
        $data['id'] = $id;
        return view('admin/category/createcategory',$data);
    }
    public function createslider($id='')
    {
        $post = $this->request->getPost();
        $file = $this->request->getFile('image');
        if (!empty($post)) {
            $msg = $this->model->insert_edit_slider($post,$file);
            return $this->response->setJSON($msg);
        }
        if($id!='')
        {
            $data=$this->model->get_master_data('slider',$id);
        }
        return view('admin/slider/createslider',$data);
    }
    public function createitem($id='')
    {
        $post = $this->request->getPost();
        $file = $this->request->getFile('image');
        if (!empty($post)) {
            $msg = $this->model->insert_edit_item($post,$file);
            return $this->response->setJSON($msg);
        }
        if($id!='')
        {
            $data=$this->model->get_master_data('item',$id);
        }
        return view('admin/item/createitem');
    }
    public function Getdata($method = '')
    {
        if ($method == 'brand') {
            $data = $this->model->get_brand_data();
            return $data;
        }
        if ($method == 'category') {
            $data = $this->model->get_category_data();
            return $data;
        }
        if ($method == 'slider') {
            $data = $this->model->get_slider_data();
            return $data;
        }
        if ($method == 'item') {
            $data = $this->model->get_item_data();
            return $data;
        }
        if($method =='getbrand')
        {
            $post = $this->request->getPost();
            $data = $this->model->getbrand($post);
            return $this->response->setJSON($data);
        }
        if($method =='getcategory')
        {
            $post = $this->request->getPost();
            // print_r($post);
            $data = $this->model->getCategory($post);
            return $this->response->setJSON($data);
        }
    }
    public function Action($method = '')
    {
        $result = array();
        if ($method == 'Update') {
            $post = $this->request->getPost();
            $result = $this->model->UpdateData($post);
        }
        return $this->response->setJSON($result);
    }
    public function ImageUpload()
    {
        // print_r('dfsbfdbdx');exit;
        header("Access-Control-Allow-Origin: * ");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: * ");
        $model = $this->model;
        $post = $this->request->getPost();
        $data = $this->request->getFiles();
        $result = array();
        // print_r($post);exit;
        $result = $this->model->multipleupload($data,$post);
        return $this->response->setJSON($result);
    }

}