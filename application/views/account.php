<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/styles/account.css">
</head>
<body>
<main class="container">
        <nav class="sidebar">
            <h1>Tasklist</h1>
            <div class="menu">
                <a href="<?php echo base_url('overview')?>"><i class="fa fa-home"></i></a>
                <a href="<?php echo base_url('tasklist')?>"><i class="fa-solid fa-square-check"></i></a>
                <a href="<?php echo base_url('account')?>" class="active"><i class="fa fa-user"></i></a>
                <a href="<?php echo base_url('logout')?>"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </nav>
        <div class="content">
            <div class="header">
                <h1>Account</h1>
            </div>
            <hr/>

            <div id="container">
            <div class="row">
                <div class="col-md-7">
                        <h4> Form Login<h4>
                        <form method="get" action="<?php echo site_url('api/task/getTasksByUserId');?>" class="form-horizontal">
                            <div class="form-group row">
                                <div class="col-sm-2 control-label">Tasklist</div>
                                <div class = "col-sm-7">
                                <input type = "text" name="user_id" class="form-control">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class = "col-sm-4">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
            </div>
        </div>
    </main>
</body>
</html>
