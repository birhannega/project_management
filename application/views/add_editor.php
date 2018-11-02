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

    echo validation_errors();
    echo $this->session->flashdata('msg');


   foreach ($projectdetail as $detail)
       $name=$detail->project_name;
   $prid=$detail->Project_id;


    ?>
    <div class="col-lg-5">
        <strong>project: <?=$name?>(ID:<?=$prid?>)</strong>
        <form class="form-group" method="post" action="<?php echo base_url()?>project/assign_editor">

            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Project </label>
              <input type="hidden" class="form-control" name="projectid"   value="<?=$prid?>">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Moderator</label>
                <select  class="form-control" id="editor" name="editor">
                    <option>choose editor</option>
                    <?php
                    foreach ($editors as $user){
                        echo "<option value='".$user->user_id."'>".$user->First_name." ".$user->Last_name."</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary pull-right">Assign</button>
        </form>
    </div>










</div>


</body>
</html>
