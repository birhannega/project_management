<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 10/25/2018
 * Time: 12:09 AM
 */

class User_model extends MY_Model
{
    function user_auth($user, $password)
    {
        $this->db->where('username',$user);
        $this->db->where('user_status',1);
        $query_result=$this->db->get('tbl_users');

        $dbpassword=$query_result->row(3)->Password;

        //$role=$query_result->row(5)->Role_ID;
        if(password_verify($password,$dbpassword)){
            return $query_result->result();

        }else
            {
            return false;
        }

    }

    function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function get_users()
    {
        return $this->db->get('tbl_users')->result();
    }

    function get_editors()
    {
        $this->db->where('user_role', 2);
        return $this->db->count_all_results('tbl_users');
    }
    function list_editors()
    {
        $this->db->where('user_role', 2);
        $this->db->where('user_status', 1);
        return $this->db->get('tbl_users')->result();
    }

    function get_moderators()
    {
        $this->db->where('user_role', 3);
        return $this->db->count_all_results('tbl_users');
    } function list_moderators()
    {
        $this->db->where('user_role', 3);
        $this->db->where('user_status', 1);
        return $this->db->get('tbl_users')->result();
    }
    function get_account_count(){
        return $this->db->count_all_results('tbl_users');
    }




}