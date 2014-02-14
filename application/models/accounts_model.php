<?php

class Accounts_model extends CI_Model
{    
    /*
     * Insert Reseller
     * @param array $data (required)
     * @return boolean
     */
    function insert_reseller($data)
    {
        $data['date_registered'] = date('Y-m-d h:i:s');
        return $this->db->insert('client', $data);
    }
    
    /*
     * Insert Supplier
     * @param array $data (required)
     * @return array
     */
    function insert_supplier($data)
    {
        $data['date_registered'] = date('Y-m-d h:i:s');
        $data['password'] = md5($password);
        $data['status'] = $this->db->insert('client', $data);
        if($data['status'] === TRUE) {
            $data['id'] = $this->db->insert_id();
        }
        return $data;
    }
    
    /*
     * Insert Billing Information
     * @param array $data (required)
     * @return array
     */
    function insert_billing_information($data)
    {
        $data['status'] = $this->db->insert('client_billing', $data);
        if($data['status'] === TRUE) {
            $data['id'] = $this->db->insert_id();
        }
        return $data;
    }
    
    /*
     * Insert Financial Information
     * @param array $data (required)
     * @return array
     */
    function insert_financial_information($data)
    {
        $data['status'] = $this->db->insert('financial', $data);
        if($data['status'] === TRUE) {
            $data['id'] = $this->db->insert_id();
        }
        return $data;
    }
    
    /*
     * Insert Email Verification
     * @param string $email (required)
     * @param string $verification_code (required)
     * @return boolean
     */
    function insert_email_verification($email = NULL, $verification_code = NULL)
    {
        if(empty($email) || empty($verification_code)) return FALSE;
        
        $data['email'] = $email;
        $data['verification_code'] = $verification_code;                
        $data['date_created'] = date('Y-m-d h:i:s');
        
        $this->db->delete('email_verification', array('email' => $email));
        return $this->db->insert('email_verification', $data);
    }
    
    /*
     * Delete Email Verification
     * @param string $email (required)
     * @param string $verification_code (required)
     * @return boolean
     */
    function delete_email_verification($email = NULL, $verification_code = NULL)
    {
        $this->db->delete('email_verification', array('email' => $email, 'verification_code' => $verification_code));
    }
    
    /*
     * Get Verification Code
     * @param string $verification_code (required)
     * @param string $email (required)
     * @param string $what (optional)
     * @return array
     */
    function get_activation_code($verification_code = NULL, $email = NULL, $what = '*')
    {
        if(empty($email) || empty($verification_code)) return FALSE;
        
        $query = $this->db->select($what)
                          ->from('email_verification')
					 ->where('verification_code', $verification_code)
                          ->where('email', $email)
					 ->get();
        return $query->row_array();
    }
    
    /*
     * Update Client Activated
     * @param string $email (required)
     * @return boolean
     */    
    public function update_client_activated($email)
    {
        return $this->db->update('client', array('activated' => 1), array('email' => $email));
    }
    
    /*
     * Get Client
     * @param $client_type (optional)
     * @param $client_id (optional)
     * @param $what (optional)
     * @return array
     */
    function get_client($client_type = NULL, $client_id = NULL, $what = "*")
    {
        $query = $this->db->select($what)
                          ->from('client')
					 ->get();
        
        if(!empty($client_id)) $this->db->where('id', $client_id);
        if(!empty($client_type)) $this->db->where('id', $client_type);

        return $query->row_array();
    }
    
    /*
     * Delete Client
     * @param string $client_id (required)
     * @return boolean
     */
    function delete_client($client_id = NULL)
    {
        if(empty($client_id)) return FALSE;
        $this->db->delete('client', array('id' => $client_id));
    }
    
    /*
     * Update Client
     * @param string $client_id (required)
     * @return boolean
     */
    function update_client($data = array())
    {
        if(empty($data)) return FALSE;
        $this->db->where('id', $data['id']);
        $this->db->update('client', $data); 
    }
}
?>
