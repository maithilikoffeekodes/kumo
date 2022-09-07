<?php

namespace App\Controllers\admin;

use App\Controllers\admin\BaseController;
use App\Models\admin\AuthModel;

class Auth extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new AuthModel();
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
            return redirect()->to(url('admin/Home/index'));
        } else {
            return view('admin/login', $data);
        }
        return view('admin/login');
    }
    public function logout()
    {
        $session = session();
        $session->remove('id');
        return redirect()->to(url('admin/Auth/login'));
    }
}
