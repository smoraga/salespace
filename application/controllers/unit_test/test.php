<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class test extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    /* Load Views */
    public function test_registration()
    {
        $credentials = $this->session->userdata('credentials');
        
        echo '<pre>';
        print_r($credentials);
        
        
        $credentials = $this->session->userdata('credentials');
        $data['success'] = FALSE;

        if($credentials) {
            if(isset($credentials['client_info']) && !empty($credentials['client_info']) && isset($credentials['billing_info']) && !empty($credentials['billing_info'])) {
                $this->load->model('accounts_model');
                
                $client_info = $credentials['client_info'];
                $client_info['type'] = 1;
                
                
                $insert_client_info = $this->accounts_model->insert_supplier($client_info);
                
                if($insert_client_info['status'] === TRUE) {
                    $billing_info = $credentials['billing_info'];
                    $billing_info['fk_client_id'] = $insert_client_info['id'];
                    $billing_info['first_name'] = $client_info['first_name'];
                    $billing_info['last_name'] = $client_info['last_name'];
                    $billing_info['middle_name'] = $client_info['middle_name'];
                    
                    $insert_billing_info = $this->accounts_model->insert_billing_information($billing_info);
                    
                    if($insert_billing_info['status'] === TRUE) {
                        $financial_info = $credentials['financial_info'];
                        $financial_info['fk_client_id'] = $billing_info['fk_client_id'];
                        $insert_financial_info = $this->accounts_model->insert_financial_information($financial_info);
                        
                        if($insert_financial_info['status'] === TRUE) {
                            echo 'Successfully Insert';
                        }
                    }
                }
            }
        } else {
            echo 'Invalid Credentials';
        }
    }
}