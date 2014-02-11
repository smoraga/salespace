<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view("templates/admin/index_view");
    }
    
    public function home() {
        $this->load->view("templates/admin/dashboard_view");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */