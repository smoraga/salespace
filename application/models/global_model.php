<?php

class Global_model extends CI_Model
{    
    /*
     * Generic Select
     * @param string $table (required)
     * @param string $where_field (required)
     * @param string $where_value (required)
     * return max
     */
    function generic_select($table = NULL, $where_field = NULL, $where_value = NULL, $what = "*")
    {
        if(empty($table)) return FALSE;
        
        $this->db->select($what)
                 ->from($table);
        
        if(!empty($where_field) && !empty($where_value)) {
            $this->db->where($where_field, $where_value);
            $query = $this->db->get();
            return $query->row_array();
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }

    /*
     * Generic Insert
     * @param string $table (required)
     * @param array $data (required)
     */
    public function generic_insert($table = NULL, $data = NULL)
    {
        if(empty($table) && empty($data)) return FALSE;
        return $this->db->insert($table, $data);
    }
    
    /*
     * Generic Update
     * @param int $id (required)
     * @param string $table (required)
     * @param array $data (required)
     */
    public function generic_update($id = NULL, $table = NULL, $data = NULL)
    {
        if(empty($id) && empty($table) && empty($data)) return FALSE;
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }
    
    /*
     * Generic Delete
     * @param string $table (required)
     * @param string $field (required)
     * @param string $value (required)
     * @return boolean
     */
    function generic_delete($table = NULL, $field = NULL, $value = NULL)
    {
        if(empty($table) && empty($field) && empty($value)) return FALSE;
        $this->db->delete($table, array($field => $value));
    }
}
?>
