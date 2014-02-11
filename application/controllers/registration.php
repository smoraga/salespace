<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function supplier() {
        $this->load->view('templates/front_end/registration/supplier_view');
    }
    
    public function reseller() {
        $this->load->view('templates/front_end/registration/reseller_view');
    }
	
    public function billing_information() {
        $this->load->view('templates/front_end/registration/billing_address_view');
    }

    public function financial() {
        $this->load->view('templates/front_end/registration/financial_view');
    }
}