<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('accounts_model');
    }
    
    public function index() {
        $this->load->view('templates/admin/supplier_view.php');
    }
    
    public function register_supplier()
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
            $posts['type'] = 2;
            
            $status = $this->accounts_model->insert_reseller($posts);
            
            if($status === TRUE) {
                $this->load->library('email');
                $this->load->helper('string');
                
                $verification_code = random_string('alnum', 24);
                $this->accounts_model->insert_email_verification($posts['email'], $verification_code);                
                
                $email_to = $posts['email'];
                $message = array(
                    'name'     => str_replace('  ', '', $posts['first_name'].' '.$posts['middle_name'].' '.$posts['last_name']),
                    'verification_code' => $verification_code,
                    'verification_url'  => base_url().'admin/supplier/verify/'.$verification_code.'/'.$email_to
                );
                 
                $this->email->send_email($email_to, 'no-reply@salespace.com', 'Salespace User Account', $message, 'registration');
            }
          }
        }
        echo json_encode($data);
    }
    
    public function verify($verification_code = '', $email = '')
    {
        $result = $this->accounts_model->get_activation_code($verification_code, $email);

        if(!empty($result)) {
            $date_created = $result['date_created'];
            $date_expire = strtotime($date_created . " +1 days");
            $current = strtotime(date('Y-m-d h:i:s'));

            if($current < $date_expire) {
                $return = $this->accounts_model->update_client_activated($email);

                if($return === TRUE) {
                    echo "account successfully activated";
                    $this->accounts_model->delete_email_verification($email, $verification_code);
                }
            } else {
                $this->accounts_model->delete_email_verification($email, $verification_code);
            }
        } else {
            redirect(base_url().'admin/supplier');
        }
    }
}