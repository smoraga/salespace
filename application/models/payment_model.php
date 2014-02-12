<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
    function options($what = '*') {
        $query = $this->db->select($what)->from('payment_options')->get();
        
        return $query->result();
    }
}