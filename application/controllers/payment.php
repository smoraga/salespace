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
    
    public function otc() {
        $this->load->view('templates/front_end/registration/payment_otc_view');
    }
    
    public function paypal() {
        $this->load->view('templates/front_end/registration/payment_paypal_view');
    }
}