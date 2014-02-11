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
        $data['password'] = md5($data['password']);
        return $this->db->insert('client', $data);
    }
    
    /*
     * Insert Supplier
     * @param array $data (required)
     * @return boolean
     */
    function insert_supplier($data)
    {
        $data['date_registered'] = date('Y-m-d h:i:s');
        $data['password'] = md5($data['password']);
        return $this->db->insert('client', $data);
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
}
?>
