<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 10/23/2018
 * Time: 7:37 PM
 */

class User extends MY_Controller
{
    function auth()
    {
        //Get form data
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == FALSE) {
            $data = array('page_title' => "PMsys-Login");
            $this->load->view('login', $data);
        } else {

            $role = '';
            $valid = $this->User_model->user_auth($username, $password);

            if ($valid) {
                foreach ($valid as $valid_user) {
                    $role = $valid_user->user_role;

                    // role 1-admin
                    // role 2-moderator
                    // role 3-editor
                }
                switch ($role) {
                    case 1: {
                        $this->destroy_sessions();
                        $this->session->set_userdata('admin', $username);
                        $this->user = $this->session->userdata('admin');
                        redirect(base_url() . 'project');
                    }
                    case 2: {
                        $this->destroy_sessions();
                        $this->session->set_userdata('editor', $username);
                        $this->user = $this->session->userdata('editor');
                        redirect(base_url() . 'project');

                    }
                    case 3: {
                        $this->destroy_sessions();
                        $this->session->set_userdata('moderator', $username);
                        $this->user = $this->session->userdata('moderator');
                        redirect(base_url() . 'project');
                    }
                }

            } else {
                $this->session->set_flashdata('msg', "<div class='alert alert-danger'>Invalid user cridentials. </div>");// set success message
                redirect(base_url());// redirect to Login form

            }

        }

    }
    function save_user_data()
    {

        $this->table = 'tbl_users';
        //Get form data
        $role = $this->input->post('role');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // validate data
        $this->form_validation->set_rules('role', 'role ', 'required|min_length[1]|max_length[12]');
        $this->form_validation->set_rules('username', 'user name', 'is_unique[tbl_users.username]|required|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('lastname', 'Last name', 'required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('firstname', 'First name', 'required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[12]');

        // check if the validation works
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
            echo $this->create();
        } else {
            // encrypt password
            $options = ['cost' => 12];
            $encrypted_pass = password_hash($password, PASSWORD_BCRYPT, $options);

            //corresponding variables to respective column
            $data = array(
                'username' => $username,
                'First_name' => $firstname,
                'Last_name' => $lastname,
                'Email' => $email,
                'user_role' => $role,
                'Password' => $encrypted_pass

            );
            $is_inserted_dated = $this->User_model->insert($this->table, $data);
            if ($is_inserted_dated) {
                // if registration is successfull
                $this->session->set_flashdata('msg', "<div class='alert alert-success'>Account successfully Created</div>");// set success message
                redirect(base_url('user/create'));// redirect to account creation form
            } else {
                // if registration is not successful
                $this->session->set_flashdata('message', "User account not created");// set error message
                redirect(base_url('user/create'));// redirect to account creation form
            }
        }
    }

    function Create()
    {
        $data['page_title'] = "Create user";
        $data['users'] = $this->User_model->get_users();
        if ($this->isadmin()) {

            $this->load->view('addUser', $data);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">You should have to login as admin  to create new account</div>');
            $this->load->view('addUser', $data);
        }

    }

    function moderators()
    {
        $data['page_title'] = "Moderators";
        $data['moderators'] = $this->User_model->list_moderators();

        $this->load->view('moderators', $data);
    }

    function Editors()
    {
        $data['page_title'] = "Editors";
        $data['editors'] = $this->User_model->list_editors();
        $this->load->view('editors', $data);
    }

    function logout()
    {
        $this->signout();
    }

}