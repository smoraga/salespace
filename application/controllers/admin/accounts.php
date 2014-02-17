<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Accounts extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('accounts_model');
        
        if($this->session->userdata('authenticated_user') === FALSE) redirect(base_url().'admin/dashboard');
    }
    
    public function supplier_listing() {
        $data['supplier_listing'] = $this->accounts_model->get_client(2);
        $this->load->view('templates/admin/accounts/supplier_listing_view', $data);
    }
    
    public function reseller_listing() {
        $data['reseller_listing'] = $this->accounts_model->get_client(1);
        $this->load->view('templates/admin/accounts/reseller_listing_view', $data);
    }
    
    public function buyer_listing() {
        $data['buyer_listing'] = $this->accounts_model->get_client(3);
        $this->load->view('templates/admin/accounts/buyer_listing_view', $data);
    }
	
	public function add() {
         $this->load->model('address_model');
        
        $data['cities'] = $this->address_model->get_all_city();
        $data['states'] = $this->address_model->get_all_state();
        
        $this->load->view('templates/admin/accounts/account_profile_add', $data);
    }
    
    public function view($id = NULL) {
        if(empty($id)) redirect(base_url().'admin/accounts/supplier_listing');
        $id = base64_decode($id);
        $data['client_info'] = $this->accounts_model->get_client_full_info($id);
        $this->load->view('templates/admin/accounts/account_profile_view',$data);
    }
    
    public function edit($id = NULL) {
        
        if(empty($id)) redirect(base_url().'admin/accounts/supplier_listing');
        
        $id = base64_decode($id);
        $data['client_info'] = $this->accounts_model->get_client_full_info($id);
        
        $this->load->model('address_model');
        
        $data['cities'] = $this->address_model->get_all_city();
        $data['states'] = $this->address_model->get_all_state();
        
        $this->load->view('templates/admin/accounts/account_profile_edit', $data);
    }
    
    public function add_client_account()
    {
        $client_id = $this->input->post('client_id');
        $data['success'] = FALSE;
        
        $client_info = array(
                'first_name'    => $this->input->post('first_name', TRUE),
                'last_name'     => $this->input->post('last_name', TRUE),
                'middle_name'   => $this->input->post('middle_name', TRUE),
                'email'         => $this->input->post('email', TRUE),
        );
        
        $billing_info = array(
                'company'   => $this->input->post('company', TRUE),
                'address'   => $this->input->post('address', TRUE),
                'country'   => $this->input->post('country', TRUE),
                'city'      => $this->input->post('city', TRUE),
                'state'      => $this->input->post('state', TRUE),
                'zip'       => $this->input->post('zip', TRUE),
                'phone'     => $this->input->post('phone', TRUE),
                'fax'       => $this->input->post('fax', TRUE)
        );
        
        
        $financial_info = array(
                'tin_number'   => $this->input->post('tin', TRUE),
                'company_name'   => $this->input->post('company', TRUE),
                'company_address'   => $this->input->post('company_address', TRUE),
                'company_phone'      => $this->input->post('company_phone', TRUE),
                'company_fax'       => $this->input->post('company_fax', TRUE),
                'sec_number'     => $this->input->post('sec_number', TRUE),
                'company_email'     => $this->input->post('company_email', TRUE)
        );
        
        if($client_id) {
            $client_status = $this->global_model->generic_update($client_id, 'client', $client_info);
            $client_billing_status = $this->global_model->generic_update($client_id, 'client_billing', $billing_info);
            $financial_status = $this->global_model->generic_update($client_id, 'financial', $financial_info);
        } else {
            $client_status_info = $this->accounts_model->generic_insert_client($client_info);
            $client_status = $client_status_info['status'];
            
            $billing_info['fk_client_id'] = $client_status_info['id'];
            $billing_info['first_name'] = $client_info['first_name'];
            $billing_info['middle_name'] = $client_info['middle_name'];
            $billing_info['last_name'] = $client_info['last_name'];
            $client_billing_status = $this->global_model->generic_insert('client_billing', $billing_info);
            
            $financial_info['fk_client_id'] = $client_status_info['id'];
            $financial_status = $this->global_model->generic_insert('financial', $financial_info);
        }
        
        if($client_status === TRUE && $client_billing_status === TRUE && $financial_status === TRUE) {
            $data['success'] = TRUE;
        }
        echo json_encode($data);
    }
}