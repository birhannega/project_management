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

    <a href="#"><strong><span class="fa fa-dashboard"></span> My Dashboard  </strong></a>
    <hr>

</div>
<script type="text/javascript">
</script>
</body>
</html>
