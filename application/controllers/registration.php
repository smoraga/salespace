<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Registration extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    /* Load Views */
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
    
    /* Process */
    public function process_client_information()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('middle_name', 'Middle name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Password Confirm', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[client.email]');

        $posts = $this->input->post();
        $data['success'] = FALSE;
        
        if($posts) { 
          if ($this->form_validation->run() == FALSE) {
            $data['errors'] = array(
                'first_name'    => form_error('first_name', ' ', ' '),
                'last_name'     => form_error('last_name', ' ', ' '),
                'middle_name'   => form_error('middle_name', ' ', ' '),
                'username'      => form_error('username', ' ', ' '),
                'password'      => form_error('password', ' ', ' '),
                'cpassword'     => form_error('cpassword', ' ', ' '),
                'email'         => form_error('email', ' ', ' ')
            );          
          } else {
            $data['success'] = TRUE;
            $data['redirect_url'] = base_url().'registration/billing_information';
            
            $client_info = array(
                                    'first_name'    => $this->input->post('first_name', TRUE),
                                    'last_name'     => $this->input->post('last_name', TRUE),
                                    'middle_name'   => $this->input->post('middle_name', TRUE),
                                    'email'         => $this->input->post('email', TRUE)
            );
            
            $session_parse_status = $this->_parse_session_info($client_info, 'client_info');
            
            if($session_parse_status === FALSE) {
                $session_data['credentials']['client_info'] = $client_info;
                $this->session->set_userdata($session_data);
            }
          }
        }
        echo json_encode($data);
    }
    
    public function process_billing_address()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('zip', 'Zip', 'required|min_length[4]|numeric');
        $this->form_validation->set_rules('phone', 'phone', 'required|numeric');
        $this->form_validation->set_rules('fax', 'fax', 'required|numeric');
        
        $posts = $this->input->post();
        $data['success'] = FALSE;
        
        if($posts) { 
          if ($this->form_validation->run() == FALSE) {
            $data['errors'] = array(
                'company'   => form_error('company', ' ', ' '),
                'address'   => form_error('address', ' ', ' '),
                'country'   => form_error('country', ' ', ' '),
                'city'      => form_error('city', ' ', ' '),
                'zip'       => form_error('zip', ' ', ' '),
                'phone'     => form_error('phone', ' ', ' '),
                'fax'       => form_error('fax', ' ', ' ')
            );          
          } else {
            $data['success'] = TRUE;
            $data['redirect_url'] = base_url().'registration/financial';
            
            $billing_info = array(
                                    'company'   => $this->input->post('company', TRUE),
                                    'address'   => $this->input->post('address', TRUE),
                                    'country'   => $this->input->post('country', TRUE),
                                    'city'      => $this->input->post('city', TRUE),
                                    'zip'       => $this->input->post('zip', TRUE),
                                    'phone'     => $this->input->post('phone', TRUE),
                                    'fax'       => $this->input->post('fax', TRUE)
            );
            $this->_parse_session_info($billing_info, 'billing_info');
          }
        }
        echo json_encode($data);
    }
    
    private function _parse_session_info($array_info, $array_key)
    {
        $curr_session_data = $this->session->userdata('credentials');

        if($curr_session_data) {
            $curr_session_data[$array_key] = $array_info;
            $session_data['credentials'] = $curr_session_data;
            $this->session->set_userdata($session_data);
            return TRUE;
        } else {
            return FALSE;
        }
    }
}