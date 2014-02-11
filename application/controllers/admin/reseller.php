<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reseller extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('templates/admin/reseller_view.php');
    }
    
    public function register_reseller()
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

            unset($posts['cpassword']);
            $posts['type'] = 1;

            $this->load->model('accounts_model');
            $this->accounts_model->insert_reseller($posts);
          }
        }
        echo json_encode($data);
    }
}