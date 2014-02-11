<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

class Countries_model extends CI_Model {
    function get_all_countries($what = '*') {
        $query = $this->db->select($what)->from('countries')->get();
        
        return $query->result();
    }
}