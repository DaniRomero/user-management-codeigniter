<?php
class Roles_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_roles()
    {
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function set_role($id = 0)
    {
        $this->load->helper('url');
 
        $data = array(
            'name' => $this->input->post('name')
        );
        
        if ($id == 0) {
            return $this->db->insert('roles', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('roles', $data);
        }
    }
    
    public function get_role_by_id($id){
    	$query = $this->db->get_where('roles', array('id' => $id));
        return $query->row_array();
    }

    public function delete_role($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('roles');
    }
}