<?php

class Authentication extends CI_Model
{    
    /*
     * Login
     * @param string $username (required)
     * @param string $password (required)
     * @param boolean $return_array (optional)
     * @param boolean $what (optional)
     * @return array or bollean
     */
    function login($username = NULL, $password = NULL, $return_array = FALSE, $what = '*')
    {
        if(empty($username) || empty($password)) return FALSE;
        
        $query = $this->db->select($what)
                          ->from('client')
					 ->where('username', $username)
                          ->where('password', md5($password))
					 ->get();
        return $query->row_array();
    }
}
?>
