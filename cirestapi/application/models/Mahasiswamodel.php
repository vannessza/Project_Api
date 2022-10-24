<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usermodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function getUser(){
        $result = $this->db->get('user');
        return $result-> result_array();
    }

}
