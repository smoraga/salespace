<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Billing_address extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->model('countries_model');
        
        $data['countries'] = $this->countries_model->get_all_countries();
        
        $this->load->view('templates/admin/billing_address_view', $data);
    }
}