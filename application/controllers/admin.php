<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view("templates/admin/index_view");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */