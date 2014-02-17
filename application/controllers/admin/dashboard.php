<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->view("templates/admin/index_view");
    }
    
    public function home() {
        $this->load->view("templates/admin/dashboard_view");
    }
	
	public function login()
    {
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        $posts = $this->input->post();
        
        $data['success'] = FALSE;
        $data['msg'] = "Invalid Username/Password";
        
        if($posts) { 
          if ($this->form_validation->run() == FALSE) {
            $data['errors'] = array(
                'username'    => form_error('username', ' ', ' '),
                'password'     => form_error('password', ' ', ' '),
            );          
          } else {
            $this->load->model('authentication');
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $return = $this->authentication->login($username, $password);
            
            if(!empty($return)) {
                $data['success'] = TRUE;
                $data['msg'] = "user authenticated";
            }
          }
        }
        echo json_encode($data);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url()."admin/dashboard");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */