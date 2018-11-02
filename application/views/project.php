<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo $page_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $this->load->view('css');
    ?>
</head>
<body>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <?php
    // top nav
    $this->load->view('nav');
    ?>
    <!-- /container -->
</div>
<!-- /Header -->
<!-- Main -->
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
    <?php
    // top nav
    $this->load->view('sidebar');
    ?>
</div><!-- /span-3 -->
<div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
    <!-- Right -->

    <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard </strong></a>
    <hr>
    <?php
    if($this->session->userdata('admin')) {
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary pull-right " data-toggle="modal" data-target="#myModal">
            Add new project
        </button>
        <?php
    }
    ?>
    <br>
    <br>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new project</h4>
                </div>
                <div class="modal-body">
                    <?php


                    $data = array(
                        'class' => 'form-group',
                        'method' => 'post'

                    );

                    echo form_open('project/save_project', $data);
                    ?>

                    <div class="form-group">
                        <label for="Fname">project name</label>
                        <input name="prname" class="form-control" placeholder="Project name">
                    </div>
                    <div class="form-group">
                        <label for="">date contracted</label>
                        <input  datatype="date" name="contracted"  data-provide="datepicker" class="datepicker form-control" placeholder="date contracted">
                    </div>
                    <div class="form-group">
                        <label for="">Handover Date</label>
                        <input datatype="date"  data-provide="datepicker" name="handover" class="datepicker form-control" placeholder="Handover Date">
                    </div>
                    <div class="form-group">
                        <label for="">project description </label>
                        <textarea name="prdesc" class="form-control" placeholder="Enter project details here"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <?php
    echo $this->session->flashdata('msg');
    ?>
    <div class="table-responsive">
        <?php
        if ($this->session->userdata('admin')) {


            ?>
            <table class="table table-condensed" id="usertable">
                <thead>
                <th>#</th>
                <th>project name</th>
                <th>Contracted Date</th>
                <th>Handover Date</th>

                <th>Moderator</th>
                <th>Editor</th>
                <th>Current status</th>
                </thead>
                <tbody>


                <?php
                $rolenum = 1;
                foreach ($projects as $project) {


                    echo '<tr>
                            <td>' . $rolenum . '</td>
                            <td>' . $project->project_name . '</td>
                            <td>' . $project->contract_date . '</td>
                            <td>' . $project->Project_handover_date . '</td>
                            
                            <td> Not assigned Yet
                            <a href="' . base_url() . 'project/add_moderator/' . $project->Project_id . '">
                            <button class="btn btn-sm btn-success">Assign</button></a>    </td>
                           
                            <td> Not assigned Yet
                            <a href="' . base_url() . 'project/add_editor/' . $project->Project_id . '">
                            <button class="btn btn-sm btn-success">Assign</button></a>    </td>
                              <td>' . $project->current_status . '</td>
                         </tr>';
                    $rolenum++;
                }
                ?>

                </tbody>
            </table>
            <?php
        } else if($this->session->userdata('moderator')){
            ?>
            <p class="text-success"><strong> You are allowed to Moderate the following projects</strong></p>
        <?php
        }
        else if($this->session->userdata('editor')){
            ?>
        <p class="text-success"><strong> You are allowed to  edit the following projects</strong></p>
        <?php

        }
        ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#usertable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>

</body>
</html>
