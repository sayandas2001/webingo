<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Manager_model extends CI_Model
{
    public function manager_listing()
    {
        $this->db->select('*');
        $this->db->from('manager');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function manager_add($data)
    {
        if($this->db->insert('manager',$data))
        {
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }

    public function getmanagerInfoById($manager_id)
    {
        $this->db->select('*');
        $this->db->from('manager');
        $this->db->where('id', $manager_id);
        $query= $this->db->get();
        return $query->row();
    }

    public function editmanager($managerInfo, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('manager', $managerInfo);
        
        return TRUE;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("manager");
        return true;             
    }

}
?>    