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

    <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard</strong></a>
    <hr>
    <div class="col-lg-12">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h2><?php
                        echo json_encode($accounts);
                        ?></h2>
                    <p>User accounts</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>

            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php
                        echo json_encode($totalprojects);
                        ?></h3>

                    <p>projects</p>
                </div>


            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php
                        echo json_encode($editors);
                        ?></h3>

                    <p>Editors</p>
                </div>


            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php
                        echo json_encode($moderators);
                        ?></h3>

                    <p>Moderators</p>
                </div>


            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-6 col-sm-12">
        <h3 class="text-success">List of projects </h3>
        <div class="table-responsive">
            <table class="table table-responsive table-bordered">
                <thead class="active">
                <th>#</th>
                <th>Project name</th>
                <th>started date</th>
                <th>Handover date</th>
                <th>Curent status</th>

                </thead>

                <tbody>
                <?php

                $ronno = 1;
                foreach ($projects as $project) {
                    echo '<tr>
                                   <td>' . $ronno . '</td>
                                   <td>' . $project->project_name . '</td>
                                   <td>' . $project->contract_date . '</td> 
                                   <td>' . $project->Project_handover_date . '</td>
                                   <td>' . $project->current_status . '</td>
                         </tr>';
                    $ronno++;
                }

                ?>
                </tbody>


            </table>

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
