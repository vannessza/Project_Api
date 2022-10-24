<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller{

    function __construct($config = 'rest'){
        parent::__construct($config);
        $this->load->model('Mahasiswamodel', 'model');
    }

    public function index_get(){
        $data = $this->model->getUser();
        var_dump($data);
    }

}