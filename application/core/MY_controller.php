<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 9/8/2018
 * Time: 5:54 PM
 */

class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Loading models
        $this->load->model('User_model');
        $this->load->model('project_model');


        // Load libraries
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('trackback');
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->library('parser');

        //Global variables
        $this->table = '';
        $this->primary_key = '';
        $this->user = '';

    }

    function isadmin()
    {
        if ($this->session->userdata('admin') != null) {
            return true;
        } else {
            return false;
        }
    }




    function dispaly_forbidden($data)
    {

        $this->load->view('accessdenied', $data);
    }

    function check_if_session_exists()
    {
        if (!empty($this->session->userdata('admin'))) {
            return true;
        }
        if (!empty($this->session->userdata('editor'))) {
            return true;
        } else if (!empty($this->session->userdata('moderator'))) {
            return true;
        } else {
            return false;
        }
    }

    function signout()
    {
        $this->destroy_sessions();
        redirect( base_url());

    }

    function destroy_sessions()
    {
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('moderator');
        $this->session->unset_userdata('editor');
    }

    function load_dashboard_data()
    {
        $data['totalprojects'] = $this->project_model->pr_count();
        $data['accounts'] = $this->User_model->get_account_count();
        $data['moderators'] = $this->User_model->get_moderators();
        $data['editors'] = $this->User_model->get_editors();
        $data['projects']=  $this->project_model->get_projects();

        $data['page_title'] = "Dashboard";
        return $data;
    }

    function get_logged_user()
    {
        if (!empty($this->session->userdata('admin'))) {
            $this->user = $this->session->userdata('admin');
            return $this->user;
        }
        if (!empty($this->session->userdata('editor'))) {
            $this->user = $this->session->userdata('editor');
            return $this->user;
        } else if (!empty($this->session->userdata('moderator'))) {
            $this->user = $this->session->userdata('moderator');
            return $this->user;
        } else {
            return false;
        }
    }



}