<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 10/25/2018
 * Time: 12:10 AM
 */

class MY_Model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function insert($table,$data){
      return  $this->db->insert($table,$data);

    }

}