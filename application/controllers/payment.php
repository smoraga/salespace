<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed.');

class Payment extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->model('payment_model');
        
        $data['payment'] = $this->payment_model->options();
        
        $this->load->view('templates/front_end/registration/payment_options_view', $data);
    }
    
    /* Load Views */
    
    public function otc() {
        $this->load->view('templates/front_end/registration/payment_otc_view');
    }
    
    public function paypal() {
        $this->load->view('templates/front_end/registration/payment_paypal_view');
    }
    
    /* Process */
    
    public function process_paypal()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('cc_type', 'Creditcard Type', 'required');
        $this->form_validation->set_rules('cc_number', 'Creditcard Number', 'required|numeric');
        $this->form_validation->set_rules('cc_month', 'Expiration Date Month', 'required|numeric');
        $this->form_validation->set_rules('cc_year', 'Expiration Date Year', 'required|numeric');
        $this->form_validation->set_rules('cc_last_digit', 'Last 3 Digits', 'required|numeric');
        
        $posts = $this->input->post();
        $data['success'] = FALSE;
        
        
        
        if ($this->form_validation->run() == FALSE) {
            $data['errors'] = array(
                'cc_type'   => form_error('cc_type', ' ', ' '),
                'cc_number' => form_error('cc_number', ' ', ' '),
                'cc_month'  => form_error('cc_month', ' ', ' '),
                'cc_year'   => form_error('cc_year', ' ', ' '),
                'cc_last_digit' => form_error('cc_last_digit', ' ', ' ')
            );          
          } else {
            $this->config->load('paypal');

            $config = array(
                 'Sandbox' => $this->config->item('Sandbox'), 
                 'APIUsername' => $this->config->item('APIUsername'),
                 'APIPassword' => $this->config->item('APIPassword'),
                 'APISignature' => $this->config->item('APISignature'),
            );
            
            if($config['Sandbox'])
            {
                 error_reporting(E_ALL);
                 ini_set('display_errors', '1');
            }

            $this->load->library('paypal/Paypal_pro', $config);

            $CardDetails = array(
                'type'          => $this->input->post('cc_type', TRUE),
                'acct_number'   => $this->input->post('cc_number', TRUE),
                'expdate'       => $this->input->post('cc_month', TRUE).$this->input->post('cc_year', TRUE),
                'cvv2'          => $this->input->post('cc_last_digit', TRUE)
            );
            $paypal_payment_status = $this->_paypal_direct_payment($CardDetails);
            
            if($paypal_payment_status['success'] === FALSE) {
                $data['errors'] = $paypal_payment_status['errors'];
            } else {
                $this->_register_client();
                $data['success'] = TRUE;
                $data['redirect_url'] = base_url().'registration/thankyou';
            }
        }
        echo json_encode($data);
    }
    
    private function _paypal_direct_payment($CardDetails = NULL)
    {
        $credentials = $this->session->userdata('credentials');
        $data['success'] = FALSE;

        if($credentials) {
            if(isset($credentials['client_info']) && !empty($credentials['client_info']) && isset($credentials['billing_info']) && !empty($credentials['billing_info']) && !empty($CardDetails)) {
                $DPFields = array(
                    'paymentaction'     => 'Sale', 
                    'ipaddress'         => $_SERVER['REMOTE_ADDR'],
                    'returnfmfdetails'  => '1'
                );

                $CCDetails = array(
                    'creditcardtype'    => $CardDetails['type'],
                    'acct'              => $CardDetails['acct_number'],
                    'expdate'           => $CardDetails['expdate'],
                    'cvv2'              => $CardDetails['cvv2'],
                    'startdate'         => '',
                    'issuenumber'       => ''
                );

                $PayerInfo = array(
                    'email'             => $credentials['client_info']['email'],
                    'payerid'           => '',
                    'payerstatus'       => '',
                    'business'          => 'Salespace'
                );

                $PayerName = array(
                    'salutation'        => 'Mr.',
                    'firstname'         => $credentials['client_info']['first_name'],
                    'middlename'        => $credentials['client_info']['middle_name'],
                    'lastname'          => $credentials['client_info']['last_name'],
                    'suffix'            => ''
                );

                $BillingAddress = array(
                    'street'            => $credentials['billing_info']['city'],
                    'street2'           => '',
                    'city'              => $credentials['billing_info']['city'],
                    'state'             => $credentials['billing_info']['city'],
                    'countrycode'       => 'PH',
                    'zip'               => $credentials['billing_info']['zip'],
                    'phonenum'          => $credentials['billing_info']['phone']
                );

                $PaymentDetails = array(
                    'amt'               => '100.00',
                    'currencycode'      => 'USD',
                    'itemamt'           => '95.00',
                    'shippingamt'       => '5.00',
                    'shipdiscamt'       => '',
                    'handlingamt'       => '',
                    'taxamt'            => '',
                    'desc'              => 'Registration Fee',
                    'custom'            => '',
                    'invnum'            => '',
                    'notifyurl'         => ''
                );

                $OrderItems = array();
                $Item	 = array(
                    'l_name'            => 'Salepace Registration',
                    'l_desc'            => 'Salepace Registration!',
                    'l_amt'             => '95.00',
                    'l_number'          => '123',
                    'l_qty'             => '1',
                    'l_taxamt'          => '',
                    'l_ebayitemnumber'  => '',
                    'l_ebayitemauctiontxnid'    => '',
                    'l_ebayitemorderid'         => ''
                );
                array_push($OrderItems, $Item);

                $PayPalRequestData = array(
                    'DPFields'          => $DPFields, 
                    'CCDetails'         => $CCDetails, 
                    'PayerInfo'         => $PayerInfo, 
                    'PayerName'         => $PayerName, 
                    'BillingAddress'    => $BillingAddress, 
                    'PaymentDetails'    => $PaymentDetails, 
                    'OrderItems'        => $OrderItems 
                );

                $PayPalResult = $this->paypal_pro->DoDirectPayment($PayPalRequestData);

                if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
                     $errors = $PayPalResult['ERRORS'];
                     $data['errors'] = $errors;
                } else {
                    $data['success'] = TRUE;
                }
            }
        } else {
            $data['errors'] = "Invalid Credentials";
        }
        return $data;
    }

    private function _paypal_recurring_payments($CardDetails = NULL)
    {
        
        $credentials = $this->session->userdata('credentials');
        $data['success'] = FALSE;

        if($credentials) {
            if(isset($credentials['client_info']) && !empty($credentials['client_info']) && isset($credentials['billing_info']) && !empty($credentials['billing_info']) && isset($credentials['financial_info']) && !empty($credentials['financial_info']) && !empty($CardDetails)) {
                
                $DaysTimestamp = strtotime('now');
                $Mo = date('m', $DaysTimestamp);
                $Day = date('d', $DaysTimestamp);
                $Year = date('Y', $DaysTimestamp);
                $StartDateGMT = $Year . '-' . $Mo . '-' . $Day . 'T00:00:00\Z';
                
                $CRPPFields = array(
                    'token' => '',
                );
                
                $ProfileDetails = array(
                    'subscribername'        => "Salespace Admin",
                    'profilestartdate'      => $StartDateGMT,
                    'profilereference'      => ''
                );
                
                $ScheduleDetails = array(
                    'desc'                  => 'Recuuring payment for salespace registration fee',
                    'maxfailedpayments'     => '',
                    'autobillamt'           => '1'
                );
                
                $BillingPeriod = array(
                    'billingperiod'         => 'Month',
                    'billingfrequency'      => '1',
                    'totalbillingcycles'    => '12',
                    'amt'                   => '10.00',
                    'currencycode'          => 'USD',
                    'shippingamt'           => '',
                    'taxamt'                => ''
                );

                $CCDetails = array(
                    'creditcardtype'    => $CardDetails['type'],
                    'acct'              => $CardDetails['acct_number'],
                    'expdate'           => $CardDetails['expdate'],
                    'cvv2'              => $CardDetails['cvv2'],
                    'startdate'         => '',
                    'issuenumber'       => ''
                );

                $PayerInfo = array(
                    'email'                 => $credentials['client_info']['email'],
                    'payerid'               => '',
                    'payerstatus'           => '',
                    'countrycode'           => '',
                    'business'              => $credentials['financial_info']['company']
                );

                $PayerName = array(
                    'salutation'        => 'Mr.',
                    'firstname'         => $credentials['client_info']['first_name'],
                    'middlename'        => $credentials['client_info']['middle_name'],
                    'lastname'          => $credentials['client_info']['last_name'],
                    'suffix'            => ''
                );

                $BillingAddress = array(
                    'street'            => $credentials['billing_info']['city'],
                    'street2'           => '',
                    'city'              => $credentials['billing_info']['city'],
                    'state'             => $credentials['billing_info']['city'],
                    'countrycode'       => 'PH',
                    'zip'               => $credentials['billing_info']['zip'],
                    'phonenum'          => $credentials['billing_info']['phone']
                );

                $PayPalRequestData = array(
                    'ProfileDetails' => $ProfileDetails, 
                    'ScheduleDetails' => $ScheduleDetails, 
                    'BillingPeriod' => $BillingPeriod, 
                    'CCDetails' => $CCDetails, 
                    'PayerInfo' => $PayerInfo, 
                    'PayerName' => $PayerName, 
                    'BillingAddress' => $BillingAddress
                );
                
                $PayPalResult = $this->paypal_pro->CreateRecurringPaymentsProfile($PayPalRequestData);
		
                if(!$this->paypal_pro->APICallSuccessful($PayPalResult['ACK'])) {
                     $errors = $PayPalResult['ERRORS'];
                     $data['errors'] = $errors;
                } else {
                    $data['success'] = TRUE;
                }
            }
        } else {
            $data['errors'] = "Invalid Credentials";
        }
        return $data;
	}
     
    private function _register_client()
    {
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
                            $data['success'] = TRUE;
                        }
                    }
                }
            }
        }
    }
}