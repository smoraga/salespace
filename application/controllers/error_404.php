<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class error_404 extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('templates/404_view');
    }
}