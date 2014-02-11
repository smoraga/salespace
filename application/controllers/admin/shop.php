<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('templates/admin/shop_list_view');
    }
    
    public function detail() {
        $this->load->view('templates/admin/shop_list_detail_view');
    }
}