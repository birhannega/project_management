



<html>
<head>
    <title><?php echo $page_title?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url('/resources/bootstrap/css/bootstrap.css')) ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url('/resources/font-awesome/css/font-awesome.css')) ?>">

</head>
<body>

<div class="container">
    <div class="col-lg-offset-2 col-lg-7" style="margin-top: 70px">

    <div class="panel panel-primary">
        <div class="panel-heading">Administrator Login panel</div>
        <div class="panel-body">
            <div class="form-group " >
                <?php
                echo '<p class="bg-danger">'. validation_errors().'</p>';

                echo $this->session->flashdata('msg');
                //form attributes
                $attributes = array('method' => 'post', 'id' => 'login');
                echo form_open('user/auth',$attributes)
                ?>
                <div class="form-group">
                    <label for="username">  Email/username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username/Email">
                </div>
                <div class="form-group">
                    <label for="password"> Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">sign in </button>
                </form>

            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>