<?php

class Global_model extends CI_Model
{    
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
}
?>
