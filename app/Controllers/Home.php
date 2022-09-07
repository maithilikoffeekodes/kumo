<?php

namespace App\Controllers;

use App\Models\HomeModel;


class Home extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->model = new HomeModel();

    }
    public function index(){
        return view('index');
    }
}