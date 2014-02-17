<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Accounts extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function supplier_listing() {
        $this->load->view('templates/admin/accounts/supplier_listing_view');
    }
    
    public function reseller_listing() {
        $this->load->view('templates/admin/accounts/reseller_listing_view');
    }
    
    public function buyer_listing() {
        $this->load->view('templates/admin/accounts/buyer_listing_view');
    }
    
    public function add() {
        $this->load->view('templates/admin/accounts/account_profile_add');
    }
    
    public function view() {
        $this->load->view('templates/admin/accounts/account_profile_view');
    }
    
    public function edit() {
        $this->load->model('address_model');
        
        $data['cities'] = $this->address_model->get_all_city();
        $data['states'] = $this->address_model->get_all_state();
        
        $this->load->view('templates/admin/accounts/account_profile_edit', $data);
    }
}