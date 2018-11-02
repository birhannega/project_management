<?php
/**
 * Created by PhpStorm.
 * User: Birhan
 * Date: 10/23/2018
 * Time: 7:34 PM
 */

class project extends MY_controller
{

    function index()
    {
        if ($this->check_if_session_exists()) {
            $data['page_title'] = "PMS Dashboard";
            $data = $this->load_dashboard_data();
            $this->load->view('Dashboard', $data);
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning">You should have to login first to access the dashborad</div>');
            redirect(base_url());
        }

    }

    function create()
    {
        $data['page_title'] = "Project management";
        $data['projects'] = $this->project_model->List_projects();

        if ($this->check_if_session_exists()) {
            if ($this->isadmin()) {

                $this->load->view('project', $data);
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning">You should have to login first as admin to create new project</div>');
                $this->load->view('project', $data);
            }


        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning">You should have to login first as admin to create new project</div>');
            redirect(base_url());
        }
    }

    function add_detail($project)
    {

    }


    function add_moderator($project)
    {
        $data['page_title'] = "Add moderator";
        $data['projectdetail'] = $this->project_model->get_project_details($project);
        $data['moderators'] = $this->User_model->list_moderators();


        $this->load->view('add_moderator', $data);

    }

    function add_editor($project)
    {

    }

    // form actions
    function save_details($project)
    {

    }

    function save_project()
    {
        if ($this->isadmin()) {


            $projectname = $this->input->post('prname');
            $contracted = $this->input->post('contracted');
            $handover = $this->input->post('handover');
            $desc = $this->input->post('prdesc');

            $this->table = 'tbl_project';
            $data = array(
                'Project_handover_date' => $handover,
                'project_name' => $projectname,
                'contract_date' => $contracted,
                'description' => $desc);

            $addded = $this->User_model->insert($this->table, $data);

            if ($addded) {
                $this->session->set_flashdata('msg', '<div class="alert alert-dismissable alert-success">Project  successfully registered</div>');// set success message
                redirect(base_url('project/create'));// redirect to  form
            } else {
                $this->session->set_flashdata('msg', "<div class='alert alert-dismissable alert-danger'>  Error in registering project</div>");// set success message
                redirect(base_url('project/create'));// redirect to  form
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning">You should have to login first as admin to create new project</div>');
            redirect(base_url());
        }

    }

    function reporting()
    {
        $data['page_title'] = "Project reports";

        $this->load->view('report', $data);
    }

    function progress()
    {
        $data['page_title'] = "Projct progress";

        $this->load->view('report', $data);
    }


    function assign_moderator()
    {
        $Project_id = $this->input->post('projectid');
        $this->table = 'tbl_moderator_assignment';
        $this->user = $this->session->userdata('admin');
        if ($this->user != null) {

            $this->form_validation->set_rules('projectid', 'Project', 'required|is_unique[tbl_moderator_assignment.Project_id]');
            $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">  <strong>Error <span class="fa fa-1x fa-exclamation"></span>  Moderator  already assigned for this project  
 </strong> </div>');


            // check if the validation works
            if ($this->form_validation->run() == FALSE) {
              //  redirect(base_url() . 'project/add_moderator/' . $Project_id);// redirect to  project/add_moderator/prid
                echo $this->add_moderator($Project_id);
            } else {

                $data = array(
                    'Project_id' => $this->input->post('projectid'),
                    'user_id' => $this->input->post('moderator'),
                    'assignedby' => $this->user
                );
                $insert = $this->User_model->insert($this->table, $data);
                if ($insert) {
                    $this->session->set_flashdata('msg', "<div class='alert alert-success'><strong> Moderator  successfully assigned</strong></div>");// set success message
                    redirect(base_url().'project/add_moderator/'.$Project_id);
                } else {
                    $this->session->set_flashdata('msg', "<div class='alert alert-danger'><strong>Moderator not assigned successfully </strong></div>");// set success message
                    redirect(base_url().'project/add_moderator/'.$Project_id);
                }

            }
        }

        else {
                $data = array('erros' => "The requested operation cannot be performed.You are not permitted to view product info",
                    'page_title' => 'Access denied');
                $this->dispaly_forbidden($data);
            }
        }


}