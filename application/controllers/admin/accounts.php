<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Accounts extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function supplier_listing() {
        $this->load->view('templates/admin/accounts/supplier_listing_view');
    }
    
    public function reseller_listing() {
        
    }
    
    public function buyer_listing() {
        
    }
}