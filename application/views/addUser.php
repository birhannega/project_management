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

    <?php
    if ($this->session->userdata('admin')) {
        ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
            Add new user
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
                    <h4 class="modal-title" id="myModalLabel">Add new user</h4>
                </div>
                <div class="modal-body">
                    <?php

                    $data = array(
                        'class' => 'form-group',
                        'method' => 'post'

                    );

                    echo form_open('user/save_user_data', $data);
                    ?>
                    <div class="form-group">
                        <label for="role">choose user role</label>
                        <select class="form-control" name="role" required>
                            <option value="">choose role</option>
                            <option value="1">Administrator</option>
                            <option value="2">Editor</option>
                            <option value="3">Moderator</option>


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Fname">First name</label>
                        <input required name="firstname" class="form-control" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input required name="lastname" class="form-control" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="">username</label>
                        <input required name="username" class="form-control" placeholder="Enter user name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input required type="email" name="email" class="form-control" placeholder="Enter your Email">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input required type="password" name="password" class="form-control"
                               placeholder="Enter password">

                    </div>
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>

                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <?php
        echo $this->session->flashdata('msg');
        echo validation_errors();
        ?>
        <table class="table table-condensed" id="usertable">
            <thead>
            <th>#</th>
            <th>Full name</th>

            <th>User name</th>
            <th>role</th>
            <th> status</th>
            <th>Edit</th>
            <th>Close</th>
            </thead>
            <tbody>
            <?php
            $count = 1;
            $role = '';
            foreach ($users as $user) {

                $role = $user->user_role;

                if ($role == 1) {
                    $role = 'Administrator';
                } else if ($role == 2) {
                    $role = 'Moderator';
                } else if ($role == 3) {
                    $role = 'Editor';
                }

                echo ' <tr>
                <td>' . $count . '</td>
                <td>' . $user->First_name . " " . $user->Last_name . '</td>
                <td>' . $user->username . '</td>
                <td>' . $role . '</td>
                <td>' . $user->Email . '</td>
                <td>
                <a>
                <button class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></button></a></td>
                <td><a><button class="btn btn-sm btn-danger"><span class="fa fa-trash-o"></span></button></a></td>
            </tr>';

                $count++;
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
