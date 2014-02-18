<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Configuration extends CI_Controller {
    public function __construct() {
        parent::__construct();
        //if($this->session->userdata('authenticated_user') === FALSE) redirect(base_url().'admin/dashboard');
    }
    
    public function index()
    {
        $data['configuration_listing'] = $this->global_model->generic_select('configurations');
        $this->load->view('templates/admin/configuration/index', $data);
    }
    
    public function edit($id = NULL) {
        $id = base64_decode($id);
        $data['configuration_info'] = $configs = $this->global_model->generic_select('configurations', 'id', $id);
        $this->load->view('templates/admin/configuration/edit', $data);
    }
    
    public function update() {
        $id = base64_decode($this->input->post('id', TRUE));
        $data = array( 
            'value' => $this->input->post('config_value', TRUE),
        );
        $data['success'] = $configs = $this->global_model->generic_update('id', $id, 'configurations', $data);
        echo json_encode($data);        
    }
}