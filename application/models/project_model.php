<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 10/27/2018
 * Time: 7:17 PM
 */

class project_model extends MY_Model
{
// Get projects count
    function pr_count(){
        return $this->db->count_all_results('tbl_project');
    }
    function List_projects(){
        return $this->db->get('tbl_project')->result();
    }
    function get_project_details($pid){
        $this->db->where('Project_id',$pid);
        return $this->db->get('tbl_project')->result();
    }

    function get_projects(){
        return $this->db->get('tbl_project')->result();
    }
}