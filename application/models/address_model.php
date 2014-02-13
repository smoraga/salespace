<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed.');

class Address_model extends CI_Model {
    function get_all_country($what = '*') {
        $query = $this->db->select($what)
                            ->from('countries')
                            ->get();
        
        return $query->result();
    }
    
    function get_all_city($what = '*') {
        $query = $this->db->distinct()
                            ->select('city')
                            ->from('postal_city_state_region')
                            ->get();
        
        return $query->result();
    }
}