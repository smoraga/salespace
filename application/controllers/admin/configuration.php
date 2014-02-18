<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Configuration extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('accounts_model');
        
        //if($this->session->userdata('authenticated_user') === FALSE) redirect(base_url().'admin/dashboard');
    }
    
    public function index()
    {
        $configs = $this->global_model->generic_select('configurations');
        print_r($configs);
    }
    
    public function edit($id = NULL) {
        $id = base64_decode($id);
        $data['client_info'] = $this->accounts_model->get_client_full_info($id);
        
        $this->load->view('templates/admin/configuration/edit', $data);
    }    
}